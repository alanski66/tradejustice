<?php namespace Craft;

class StagecraftVariable {

  public function CategoryGroupStatus($handle) {
    if ( craft()->categories->getGroupByHandle($handle) ) {
      return '<p class="exists">Update existing category group</p>';
    }

    return "<p class='new'>Create new Category group</p>";
  }

  public function TagGroupStatus($handle) {
    if ( craft()->tags->getTagGroupByHandle($handle) ) {
      return '<p class="exists">Update existing tag group</p>';
    }

    return "<p class='new'>Create new Tag group</p>";
  }

  public function GlobalSetStatus($handle) {
    if ( craft()->globals->getSetByHandle($handle) ) {
      return '<p class="exists">Update existing global set</p>';
    }

    return "<p class='new'>Create new global set</p>";
  }

  public function FieldGroupStatus($name) {
    foreach (craft()->fields->getAllGroups() as $group) {
      if ($name == $group->name) {
        return '<p class="exists">Update existing field group</p>';
      }
    }

    return "<p class='new'>Create new field group</p>";
  }

  public function EntryTypeStatus($sectionhandle, $handle) {
    if ( $section = craft()->sections->getSectionByHandle($sectionhandle) ) {
      foreach ($section->getEntryTypes() as $entryType) {
        if ( $handle == $entryType->handle ) {
          return '<p class="exists">Update existing entry type</p>';
        }
      }
    }

    return "<p class='new'>Create new entry type</p>";
  }

  public function SectionStatus($handle, $type) {
    if ( $section = craft()->sections->getSectionByHandle($handle) ) {
      if ($type != $section->type) {
        return '<p class="exists">Update existing section, type will change from ' . $section->type . ' to ' . $type . '</p>';
      } else {
        return '<p class="exists">Update existing section</p>';
      }
    }

    return "<p class='new'>Create new section</p>";
  }

  public function FieldStatus($group, $handle, $type) {
    if ( $field = craft()->fields->getFieldByHandle($handle) ) {
      if ($field->handle == $handle) {
        $msg = "Update existing field";

        if ($type != $field->type) {
          $msg .= ', type will change from ' . $field->type . ' to ' . $type;
        }

        if ($group != $field->group) {
          $msg .= ', field will move from group ' . $field->group . ' to ' . $group;
        }

        return '<p class="exists">' . $msg . '</p>';
      }
    }

    return "<p class='new'>Create new field</p>";
  }
}
