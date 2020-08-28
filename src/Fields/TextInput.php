<?php

namespace Paksuco\Settings\Fields;

use Livewire\Component;

class TextInput extends Component
{
    public $tiTitle;
    public $tiValue;
    public $tiProps;
    public $tiModel;

    public function mount($title, $value, $model, $props = [])
    {
        $this->tiTitle = $title;
        $this->tiValue = $value;
        $this->tiProps = $props;
        $this->tiModel = $model;
    }

    public static function getFieldName()
    {
        return "Text Input";
    }

    public function updatedTiValue()
    {
        $this->emitUp("settings-ui::updated", [
            "model" => $this->tiModel,
            "value" => $this->tiValue,
        ]);
    }

    public function render()
    {
        return view("paksuco-settings::fields.textinput.input");
    }

    public static function propertiesForm()
    {
        return view("paksuco-settings::fields.textinput.properties");
    }
}
