<?php

namespace Paksuco\Settings\Fields;

class Repeater extends SettingsField
{
    public $items;

    public $keyInput;

    public $valueInput;

    public function mount($title, $key, $value, $model, $props = [])
    {
        parent::mount($title, $key, $value, $model, $props);

        $this->items = [];
    }

    public function addItem()
    {
        $this->items[$this->keyInput] = $this->valueInput;
        $this->informUpperLevel();
    }

    public function moveItemUp($key)
    {
        $keys = array_keys($this->items);
        $index = array_search($key, $keys);
        if ($index == 0) {
            return;
        }

        $keyToSwap = $keys[$index - 1];
        $keys[$index] = $keyToSwap;
        $keys[$index - 1] = $key;
        $items_new = [];
        foreach ($keys as $key_new) {
            $items_new[$key_new] = $this->items[$key_new];
        }
        $this->items = $items_new;
        $this->informUpperLevel();
    }

    public function moveItemDown($key)
    {
        $keys = array_keys($this->items);
        $index = array_search($key, $keys);
        if ($index == count($this->items) - 1) {
            return;
        }

        $keyToSwap = $keys[$index + 1];
        $keys[$index] = $keyToSwap;
        $keys[$index + 1] = $key;
        $items_new = [];
        foreach ($keys as $key_new) {
            $items_new[$key_new] = $this->items[$key_new];
        }
        $this->items = $items_new;
        $this->informUpperLevel();
    }

    public function deleteItem($key)
    {
        unset($this->items[$key]);
        $this->informUpperLevel();
    }

    private function informUpperLevel()
    {
        $this->emitUp("settings-ui::updated", [
            "model" => "fieldProps.values",
            "value" => $this->items
        ]);
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
