<?php namespace Craft;

require_once __DIR__ . '/BaseStagecraftService.php';

class Stagecraft_TagsService extends BaseStagecraftService {

  public function export(array $groups) {
    $groupDefs = array();

    foreach ($groups as $group) {
      $groupDefs[$group->handle] = array(
        'name' => $group->name,
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

    $groups = craft()->tags->getAllTagGroups('handle');

    foreach ($groupDefs as $groupHandle => $groupDef) {
      $group = array_key_exists($groupHandle, $groups) ? $groups[$groupHandle] : new TagGroupModel();

      $group->handle = $groupHandle;
      $group->name   = $groupDef['name'];

      if (!craft()->tags->saveTagGroup($group)) {
        return $result->error($group->getAllErrors());
      }

      $fieldLayout = $this->_importFieldLayout($groupDef['fieldLayout']);

      if($fieldLayout !== null) {
        $group->setFieldLayout($fieldLayout);

        if (!craft()->tags->saveTagGroup($group)) {
          return $result->error($group->getAllErrors());
        }
      } else {
        return $result->error('Failed to import field layout.');
      }
    }

    return $result;
  }
}
