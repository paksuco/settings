<?php

namespace Paksuco\Settings\Fields;

class TextInput extends SettingsField
{
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
