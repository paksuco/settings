<?php

namespace Paksuco\Settings\Components;

use Illuminate\Support\Str;
use Paksuco\Settings\Facades\Settings;
use Paksuco\Settings\Models\Option;
use Paksuco\Settings\Traits\HasDynamicSettings;

class Management extends \Livewire\Component
{
    use HasDynamicSettings;

    public $options;
    public $optionId;

    public $fieldTypes;

    public $fieldTitle;
    public $fieldKey;
    public $selectedFieldType;
    public $fieldForm;
    public $fieldProps;

    public function mount()
    {
        $this->options = Option::all();
        $this->clearSelection();
    }

    public function updated($name, $value)
    {
        $this->emit('settings-ui::'.$name.'-updated', ['value' => $value]);
    }

    public function clearSelection()
    {
        $this->optionId = null;
        $this->fieldTitle = "";
        $this->fieldKey = "";
        $this->fieldTypes = config("settings-ui.field_types", []);
        $this->fieldForm = "";
        $this->fieldProps = [];
        $this->selectedFieldType = null;
        $this->updateSubFields();
    }

    public function updatedSelectedFieldType($value)
    {
        $this->fieldProps = [];
        $this->fieldForm = $value == '' ?
        '' :
        (
            method_exists($value, "propertiesForm") ?
            $value::propertiesForm() :
            ''
        );
    }

    public function delete($key)
    {
        Settings::delete($key);
        $this->options = Option::all();
    }

    public function edit($key)
    {
        $option = $this->options->where('field_key', $key)->first();
        $this->optionId = $option->id;
        $this->fieldTitle = $option->field_title;
        $this->fieldKey = $option->field_key;
        $this->fieldType = $option->field_type;
        $this->selectedFieldType = $option->field_type;
        $this->fieldProps = json_decode($option->field_properties, true);
        $handler = new $option->field_type;
        $this->fieldForm = method_exists($handler, "propertiesForm")
            ? $handler::propertiesForm()
            : '';
        $this->updateSubFields();
    }

    public function updateSubFields()
    {

        $update = [
            "field_title" => $this->fieldTitle,
            "field_key" => $this->fieldKey,
            "field_type" => $this->selectedFieldType
        ];
        foreach ($this->fieldProps as $key => $value) {
             $update[$key] = $value;
        }
        $this->emit('settings-ui::triggerUpdate', $update);
    }

    public function addNewField()
    {
        if ($this->optionId == null) {
            $this->validate([
                "fieldKey" => "required|string|min:1|unique:options,field_key",
                "fieldTitle" => "required|string",
                "selectedFieldType" => "required|in:" . implode(",", $this->fieldTypes)
                ]);
                $this->validateSelectedFieldType();
            Settings::create(
                $this->fieldKey,
                "",
                $this->fieldTitle,
                $this->selectedFieldType,
                json_encode($this->fieldProps)
            );
        } else {
            $this->validate([
            "fieldKey" => "required|string|min:1|unique:options,field_key,{$this->optionId},id",
            "fieldTitle" => "required|string",
            "selectedFieldType" => "required|in:" . implode(",", $this->fieldTypes)
            ]);
            $this->validateSelectedFieldType();
            $setting = Option::find($this->optionId);
            $setting->field_key = $this->fieldKey;
            $setting->field_title = $this->fieldTitle;
            $setting->field_type = $this->selectedFieldType;
            $setting->field_properties = json_encode($this->fieldProps);
            $setting->save();
            $this->fieldTitle = "";
            $this->fieldKey = "";
            $this->fieldForm = "";
            $this->fieldProps = [];
            $this->selectedFieldType = null;
            $this->optionId = null;
        }
        session()->flash('success', __("Setting created"));
        $this->clearSelection();
        $this->options = Option::all();
    }

    public function validateSelectedFieldType()
    {
        $instance = new $this->selectedFieldType();
        $instance->validateFields($this->fieldProps);
    }

    public function updatedFieldTitle()
    {
        $this->resetErrorBag();
        $this->fieldKey = Str::slug($this->fieldTitle);
        $this->checkUnique();
    }

    private function checkUnique()
    {
        $this->fieldKey = trim($this->fieldKey);
        if (!empty($this->fieldKey)) {
            $unique = $this->options->where("field_key", "=", $this->fieldKey)->count() == 0;
            if ($unique == false) {
                $this->addError('field_key', 'Field already exists!');
                return false;
            }
        }
        return true;
    }

    public function render()
    {
        return view("paksuco-settings::admin.management");
    }
}
