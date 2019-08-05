<?php namespace Craft;

class StagecraftPlugin extends BasePlugin {

  public function getName() {
    return 'Stagecraft';
  }

  public function getDescription() {
    return 'Import and export Craft CMS fields, sections, tags, categories, assets, and globals.';
  }

  public function getVersion() {
    return '0.1.0';
  }

  public function getDeveloper() {
    return 'Emerson Stone';
  }

  public function getDeveloperUrl() {
    return 'http://www.emersonstone.com';
  }

  public function hasCpSection() {
    return false;
  }

  public function getSettingsUrl() {
    return 'stagecraft';
  }

  public function registerCpRoutes() {
    return array(
      'stagecraft'                 => array('action' => 'stagecraft/index'),
      'stagecraft/import'          => array('action' => 'stagecraft/importStep1'),
      'stagecraft/import/confirm'  => array('action' => 'stagecraft/importStep2'),
      'stagecraft/import/complete' => array('action' => 'stagecraft/importStep3'),
    );
  }
}
