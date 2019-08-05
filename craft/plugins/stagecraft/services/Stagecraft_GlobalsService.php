<?php namespace Craft;

require_once __DIR__ . '/BaseStagecraftService.php';

class Stagecraft_GlobalsService extends BaseStagecraftService {

  public function export(array $sets) {
    $setDefs = array();

    foreach ($sets as $set) {
      $setDefs[$set->handle] = array(
        'name' => $set->name,
        'fieldLayout' => $this->_exportFieldLayout($set->getFieldLayout())
      );
    }

    return $setDefs;
  }

  public function import(array $setDefs) {
    $result = new Stagecraft_ResultModel();

    if ( empty($setDefs) ) {
      return $result;
    }

    $sets = craft()->globals->getAllSets('handle');

    foreach ($setDefs as $setHandle => $setDef) {
      $set = array_key_exists($setHandle, $sets) ? $sets[$setHandle] : new GlobalSetModel();

      $set->handle = $setHandle;
      $set->name   = $setDef['name'];

      if (!craft()->globals->saveSet($set)) {
        return $result->error($set->getAllErrors());
      }

      $fieldLayout = $this->_importFieldLayout($setDef['fieldLayout']);

      if($fieldLayout !== null) {
        $set->setFieldLayout($fieldLayout);

        if (!craft()->globals->saveSet($set)) {
          return $result->error($set->getAllErrors());
        }
      } else {
        return $result->error('Failed to import field layout.');
      }
    }

    return $result;
  }
}
