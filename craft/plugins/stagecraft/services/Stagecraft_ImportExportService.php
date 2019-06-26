<?php namespace Craft;

class Stagecraft_ImportExportService extends BaseApplicationComponent {

  /**
   * @param string $json
   * @return Stagecraft_ResultModel
   */
  public function importFromJson($json) {
    $result = new Stagecraft_ResultModel();

    if ( $model = Stagecraft_ExportedDataModel::fromJson($json) ) {
      foreach ( $model as $section => $data ) {
        $service = "stagecraft_" . $section;

        $import = craft()->$service->import($model->$section);

        $result->consume($import);
      }
    }

    return $result;
  }

  public function loadFromJson($json) {
    $data = Stagecraft_ExportedDataModel::fromJson($json);

    return $data;
  }
}
