<?php namespace Craft;

require_once __DIR__ . '/BaseStagecraftService.php';

class Stagecraft_AssetsService extends BaseStagecraftService {

  public function export(array $assets) {
    //
  }

  public function import(array $assets) {
    return new Stagecraft_ResultModel();
  }
}
