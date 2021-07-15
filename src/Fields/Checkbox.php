<?php

namespace Paksuco\Settings\Fields;

class Checkbox extends SettingsField
{
    public $fieldRules = [
        "required" => "boolean",
        "disabled" => "boolean",
        "default" => "boolean",
        "readonly" => "boolean"
    ];

    public static function getFieldName()
    {
        return "Checkbox";
    }

    public function render()
    {
        return view("paksuco-settings::fields.checkbox.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.checkbox.properties")->render();
    }
}
