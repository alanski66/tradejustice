<?php namespace Craft;

require_once __DIR__ . '/BaseStagecraftService.php';

class Stagecraft_CategoriesService extends BaseStagecraftService {

  public function export(array $groups) {
    $groupDefs = array();

    foreach ($groups as $group) {
      $categoryGroupLocaleDefs = array();

      foreach ( $group->getLocales() as $locale ) {
        $categoryGroupLocaleDefs[] = array(
          'locale' => $locale->locale,
          'urlFormat' => $locale->urlFormat,
          'nestedUrlFormat' => $locale->nestedUrlFormat
        );
      }

      $groupDefs[$group->handle] = array(
        'name' => $group->name,
        'hasUrls' => $group->hasUrls,
        'template' => $group->template,
        'maxLevels' => $group->maxLevels,
        'fieldLayout' => $this->_exportFieldLayout($group->getFieldLayout())
      );
    }

    return $groupDefs;
  }

  public function import(array $groupDefs) {
    $result = new Stagecraft_ResultModel();

    if ( empty($groupDefs) ) {
      return $result;
    }

    $groups = craft()->categories->getAllGroups('handle');

    foreach ($groupDefs as $groupHandle => $groupDef) {
      $group = array_key_exists($groupHandle, $groups) ? $groups[$groupHandle] : new CategoryGroupModel();

      $group->handle    = $groupHandle;
      $group->name      = $groupDef['name'];
      $group->hasUrls   = $groupDef['hasUrls'];
      $group->template  = $groupDef['template'];
      $group->maxLevels = $groupDef['maxLevels'];

      if (!craft()->categories->saveGroup($group)) {
        return $result->error($group->getAllErrors());
      }

      $fieldLayout = $this->_importFieldLayout($groupDef['fieldLayout']);

      if($fieldLayout !== null) {
        $group->setFieldLayout($fieldLayout);

        if (!craft()->categories->saveGroup($group)) {
          return $result->error($group->getAllErrors());
        }
      } else {
        return $result->error('Failed to import field layout.');
      }
    }

    return $result;
  }
}
