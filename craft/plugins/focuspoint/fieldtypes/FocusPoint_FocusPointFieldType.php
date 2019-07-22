<?php
namespace Craft;

class FocusPoint_FocusPointFieldType extends AssetsFieldType
{
    protected $elementType = 'FocusPoint_Asset';
    protected $values = array();

    public function getName()
    {
        return Craft::t('Focus Point');
    }

    public function getInputHtml($name, $criteria)
    {
        craft()->templates->includeJsResource('focuspoint/jquery.focuspoint.js');
        craft()->templates->includeJsResource('focuspoint/jquery.focuspoint.helpertool.js');
        craft()->templates->includeCssResource("focuspoint/focuspoint.css");
        craft()->templates->includeCssResource("focuspoint/helper-tool.css");

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

        $variables = $this->getInputTemplateVariables($name, $criteria);

        $elementId = $this->element ? $this->element->id : null;
        $modelId = $this->model ? $this->model->id : null;

        $db_attributes = craft()->focusPoint_focusPoint->getAllFocusPoints($modelId, $elementId);
        $attributes = array();
        foreach ($db_attributes as $db_attribute) {
            $attributes[$db_attribute->assetId] = $db_attribute;
        }

        $variables["focusAttributes"] = $attributes;
        $variables["focusJs"] = "new Craft.FocusPointHelper(\"$namespacedId\");";

        return craft()->templates->render("focuspoint/input", $variables);
    }

    public function prepValue($value)
    {
        $parentValues = parent::prepValue($value);
        $i = 0;
        $array_values = isset($this->values[spl_object_hash($this->element)]["focus-attr"]) ? array_values($this->values[spl_object_hash($this->element)]["focus-attr"]) : array();
        foreach ($parentValues as $parentValue) {
            if (!empty($array_values) && array_key_exists($i, $array_values)) {
                $focus_attr = $array_values[$i];
                $focus_x = $focus_attr["data-focus-x"];
                $focus_y = $focus_attr["data-focus-y"];
            } else {
                $focus_attr = craft()->focusPoint_focusPoint->getFocusPoint($parentValue->id, $this->model->id, $this->element->id);
                $focus_x = $focus_attr->focusX;
                $focus_y = $focus_attr->focusY;
            }
            $parentValue->setAttribute("focusX", $focus_x);
            $parentValue->setAttribute("focusY", $focus_y);
            $i++;
        }
        return $parentValues;
    }

    public function prepValueFromPost($value)
    {
        $this->values[spl_object_hash($this->element)] = $value;

        if (isset($value["focus-attr"])) {
            array_pop($value);
        }

        return parent::prepValueFromPost($value);
    }

    public function onAfterElementSave()
    {
        $hash = spl_object_hash($this->element);

        $value = isset($this->values[$hash]) ? $this->values[$hash] : null;

        if ($value && isset($value["focus-attr"])) {
            //since we know we have new data, we can delete the previous records
            craft()->focusPoint_focusPoint->deleteFocusPointRecordsByFieldIdAndSourceId(
                $this->model->id,
                $this->element->id
            );

            $i = 0;
            foreach ($value["focus-attr"] as $focus_attr) {
                craft()->focusPoint_focusPoint->createOrUpdateFocusPoint(
                    $focus_attr["data-focus-x"],
                    $focus_attr["data-focus-y"],
                    $value[$i],
                    $this->model->id,
                    $this->element->id
                );
                $i++;
            }
        }

        parent::onAfterElementSave();
    }

    public function onBeforeDelete()
    {
        craft()->focusPoint_focusPoint->deleteFocusPointRecordsByFieldId($this->model->id);

        parent::onBeforeDelete();
    }
}
