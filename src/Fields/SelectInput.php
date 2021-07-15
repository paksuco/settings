<?php

namespace Paksuco\Settings\Fields;

class SelectInput extends SettingsField
{
    public $fieldRules = [
        "items" => "required|array"
    ];

    public static function getFieldName()
    {
        return "Select Input";
    }

    public function render()
    {
        return view("paksuco-settings::fields.selectinput.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.selectinput.properties")->render();
    }
}
