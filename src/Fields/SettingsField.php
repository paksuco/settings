<?php

namespace Paksuco\Settings\Fields;

use Illuminate\Support\Facades\Validator;
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

    public $fieldRules = [];

    public $random;

    public function mount($title, $key, $value, $model, $props = [])
    {
        $this->tiTitle = $title;
        $this->tiKey = $key;
        $this->tiValue = $value;
        $this->tiProps = $props;

        if (isset($this->tiProps["type"]) && $this->tiProps["type"] == "checkbox") {
            $this->tiValue = boolval($this->tiValue);
        }

        $this->fieldProps = [];
        $this->tiModel = $model;

        $this->random = Str::random(6);
        $this->TIValueUpdate();
    }

    public function getListeners()
    {
        return ['settings-ui::triggerUpdate' => 'parentUpdatedThis'];
    }

    public function parentUpdatedThis($args)
    {
        foreach ($args as $key => $value) {
            if ($this->tiKey === $key) {
                $this->tiValue = $value;
            }
        }
        $this->render();
    }

    public function TIValueUpdate()
    {
        if (!empty($this->tiModel)) {
            $this->emitUp(
                "settings-ui::updated",
                [
                "model" => $this->tiModel,
                "value" => $this->tiValue,
                ]
            );
        }
    }

    public function updatedTiValue()
    {
        $this->TIValueUpdate();
    }

    public function validateFields($values)
    {
        dd($values);
        Validator::make($values, $this->fieldRules)->validate();
    }

    abstract public static function propertiesForm();
}
