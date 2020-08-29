<?php

namespace Paksuco\Settings\Fields;

use Illuminate\Support\Str;
use Livewire\Component;

abstract class SettingsField extends Component
{
    public $tiTitle;
    public $tiKey;
    public $tiValue;
    public $tiProps;
    public $fieldProps;
    public $tiModel;

    public $random;

    public function mount($title, $key, $value, $model, $props = [])
    {
        $this->tiTitle = $title;
        $this->tiKey = $key;
        $this->tiValue = $value;
        $this->tiProps = $props;
        $this->fieldProps = [];
        $this->tiModel = $model;

        $this->random = Str::random(6);
    }

    public function updatedTiValue()
    {
        $this->emitUp("settings-ui::updated", [
            "model" => $this->tiModel,
            "value" => $this->tiValue,
        ]);
    }

    abstract public static function propertiesForm();
}
