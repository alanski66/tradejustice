<?php namespace Craft;

require_once __DIR__ . '/BaseStagecraftService.php';

class Stagecraft_SectionsService extends BaseStagecraftService {

  public function export(array $sections) {
    $sectionDefs = array();

    foreach ($sections as $section) {
      $localeDefs = array();

      foreach ($section->getLocales() as $locale) {
        $localeDefs[$locale->locale] = array(
          'enabledByDefault' => $locale->enabledByDefault,
          'urlFormat'        => $locale->urlFormat,
          'nestedUrlFormat'  => $locale->nestedUrlFormat
        );
      }

      $entryTypeDefs = array();

      foreach ($section->getEntryTypes() as $entryType) {
        $entryTypeDefs[$entryType->handle] = array(
          'name'          => $entryType->name,
          'hasTitleField' => $entryType->hasTitleField,
          'titleLabel'    => $entryType->titleLabel,
          'titleFormat'   => $entryType->titleFormat,
          'fieldLayout'   => $this->_exportFieldLayout($entryType->getFieldLayout())
        );
      }

      $sectionDefs[$section->handle] = array(
        'name'             => $section->name,
        'type'             => $section->type,
        'hasUrls'          => $section->hasUrls,
        'template'         => $section->template,
        'maxLevels'        => $section->maxLevels,
        'enableVersioning' => $section->enableVersioning,
        'locales'          => $localeDefs,
        'entryTypes'       => $entryTypeDefs
      );
    }

    return $sectionDefs;
  }

  /**
   * Attempt to import sections.
   *
   * @param array $sectionDefs
   *
   * @return Stagecraft_ResultModel
   */
  public function import(array $sectionDefs) {
    $result = new Stagecraft_ResultModel();

    if(empty($sectionDefs)) {
      // Ignore importing sections.
      return $result;
    }

    $sections = craft()->sections->getAllSections('handle');

    foreach ($sectionDefs as $sectionHandle => $sectionDef) {
      $section = array_key_exists($sectionHandle, $sections) ? $sections[$sectionHandle] : new SectionModel();

      $section->setAttributes(array(
        'handle'           => $sectionHandle,
        'name'             => $sectionDef['name'],
        'type'             => $sectionDef['type'],
        'hasUrls'          => $sectionDef['hasUrls'],
        'template'         => $sectionDef['template'],
        'maxLevels'        => $sectionDef['maxLevels'],
        'enableVersioning' => $sectionDef['enableVersioning']
      ));

      if (!array_key_exists('locales', $sectionDef)) {
        return $result->error('`sections[handle].locales` must be defined');
      }

      $locales = $section->getLocales();

      foreach ($sectionDef['locales'] as $localeId => $localeDef) {
        $locale = array_key_exists($localeId, $locales)
          ? $locales[$localeId]
          : new SectionLocaleModel();

        $locale->setAttributes(array(
          'locale'           => $localeId,
          'enabledByDefault' => $localeDef['enabledByDefault'],
          'urlFormat'        => $localeDef['urlFormat'],
          'nestedUrlFormat'  => $localeDef['nestedUrlFormat']
        ));

        // Todo: Is this a hack? I don't see another way.
        // Todo: Might need a sorting order as well? It's NULL at the moment.
        craft()->db->createCommand()->insertOrUpdate('locales', array(
          'locale' => $locale->locale
        ), array());

        $locales[$localeId] = $locale;
      }

      $section->setLocales($locales);

      if (!craft()->sections->saveSection($section)) {
        return $result->error($section->getAllErrors());
      }


      $entryTypes = $section->getEntryTypes('handle');

      if (!array_key_exists('entryTypes', $sectionDef)) {
        return $result->error('`sections[handle].entryTypes` must exist be defined');
      }

      foreach ($sectionDef['entryTypes'] as $entryTypeHandle => $entryTypeDef) {
        $entryType = array_key_exists($entryTypeHandle, $entryTypes) ? $entryTypes[$entryTypeHandle] : new EntryTypeModel();

        $entryType->setAttributes(array(
          'sectionId'     => $section->id,
          'handle'        => $entryTypeHandle,
          'name'          => $entryTypeDef['name'],
          'hasTitleField' => $entryTypeDef['hasTitleField'],
          'titleLabel'    => $entryTypeDef['titleLabel'],
          'titleFormat'   => $entryTypeDef['titleFormat']
        ));

        $fieldLayout = $this->_importFieldLayout($entryTypeDef['fieldLayout']);

        if($fieldLayout !== null) {
          $entryType->setFieldLayout($fieldLayout);

          if (!craft()->sections->saveEntryType($entryType)) {
            return $result->error($entryType->getAllErrors());
          }
        } else {
          return $result->error('Failed to import field layout.');
        }
      }
    }

    return $result;
  }
}
