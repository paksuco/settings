<?php

namespace Paksuco\Settings\Fields;

class TextInput extends SettingsField
{
    public $fieldRules = [
        "type" => "required|in:text,number,tel,address,date,datetime",
        "min" => "present|numeric",
        "max" => "present|numeric",
        "step" => "present|numeric",
        "default" => "string",
        "required" => "boolean",
        "disabled" => "boolean",
        "readonly" => "boolean",
    ];

    public static function getFieldName()
    {
        return "Text Input";
    }

    public function render()
    {
        return view("paksuco-settings::fields.textinput.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.textinput.properties")->render();
    }
}
