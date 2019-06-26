<?php namespace Craft;

abstract class BaseStagecraftService extends BaseApplicationComponent {

  abstract public function export(array $input);
  abstract public function import(array $input);

  protected function _exportFieldLayout(FieldLayoutModel $fieldLayout) {
    if ($fieldLayout->getTabs()) {
      $tabDefs = array();

      foreach ($fieldLayout->getTabs() as $tab) {
        $tabDefs[$tab->name] = array();

        foreach ($tab->getFields() as $field) {
          $tabDefs[$tab->name][$field->getField()->handle] = $field->required;
        }
      }

      return array(
        'tabs' => $tabDefs
      );
    } else {
      $fieldDefs = array();

      foreach ($fieldLayout->getFields() as $field) {
        $fieldDefs[$field->getField()->handle] = $field->required;
      }

      return array(
        'fields' => $fieldDefs
      );
    }
  }

  /**
   * Attempt to import a field layout.
   *
   * @param array $fieldLayoutDef
   *
   * @return FieldLayoutModel
   */
  protected function _importFieldLayout(Array $fieldLayoutDef) {
    $layoutTabs   = array();
    $layoutFields = array();

    if (array_key_exists('tabs', $fieldLayoutDef)) {
      $tabSortOrder = 0;

      foreach ($fieldLayoutDef['tabs'] as $tabName => $tabDef) {
        $layoutTabFields = array();

        foreach ($tabDef as $fieldHandle => $required) {
          $fieldSortOrder = 0;

          $field = craft()->fields->getFieldByHandle($fieldHandle);

          if ($field) {
            $layoutField = new FieldLayoutFieldModel();

            $layoutField->setAttributes(array(
              'fieldId'   => $field->id,
              'required'  => $required,
              'sortOrder' => ++$fieldSortOrder
            ));

            $layoutTabFields[] = $layoutField;
            $layoutFields[] = $layoutField;
          }
        }

        $layoutTab = new FieldLayoutTabModel();

        $layoutTab->setAttributes(array(
          'name' => $tabName,
          'sortOrder' => ++$tabSortOrder
        ));

        $layoutTab->setFields($layoutTabFields);

        $layoutTabs[] = $layoutTab;
      }
    } else if (array_key_exists('fields', $fieldLayoutDef)) {
      $fieldSortOrder = 0;

      foreach ($fieldLayoutDef['fields'] as $fieldHandle => $required) {
        $field = craft()->fields->getFieldByHandle($fieldHandle);

        if ($field) {
          $layoutField = new FieldLayoutFieldModel();

          $layoutField->setAttributes(array(
            'fieldId'   => $field->id,
            'required'  => $required,
            'sortOrder' => ++$fieldSortOrder
          ));

          $layoutFields[] = $layoutField;
        }
      }
    }

    $fieldLayout = new FieldLayoutModel();
    $fieldLayout->type = ElementType::Entry;
    $fieldLayout->setTabs($layoutTabs);
    $fieldLayout->setFields($layoutFields);

    return $fieldLayout;
  }
}
