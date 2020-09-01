<?php

namespace Paksuco\Settings\Fields;

class Textarea extends SettingsField
{
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
