<?php

namespace Paksuco\Settings\Fields;

class Textarea extends SettingsField
{
    public $fieldRules = [
        "maxlength" => "present|numeric",
        "cols" => "present|numeric",
        "rows" => "present|numeric",
        "default" => "string",
        "required" => "boolean",
        "disabled" => "boolean",
        "readonly" => "boolean"
    ];

    public static function getFieldName()
    {
        return "Text Area";
    }

    public function render()
    {
        return view("paksuco-settings::fields.textarea.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.textarea.properties")->render();
    }
}
