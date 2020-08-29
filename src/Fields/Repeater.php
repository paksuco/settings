<?php

namespace Paksuco\Settings\Fields;

class Repeater extends SettingsField
{
    public $items;

    public function mount($title, $key, $value, $model, $props = [])
    {
        parent::mount($title, $key, $value, $model, $props);

        $this->items = [
            "k1" => "v1",
            "k2" => "v2",
            "k3" => "v3",
            "k4" => "v4",
            "k5" => "v5",
            "k6" => "v6",
        ];
    }

    public function addItem()
    {
        $this->items[$this->tiKey] = $this->tiValue;
    }

    public function moveItemUp($key)
    {
    }

    public function moveItemDown($key)
    {
    }

    public function deleteItem($key)
    {
        unset($this->items[$key]);
    }

    public static function getFieldName()
    {
        return "Repeater";
    }

    public function render()
    {
        return view("paksuco-settings::fields.repeater.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.repeater.properties")->render();
    }
}
