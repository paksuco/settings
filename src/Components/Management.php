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
    public $option;

    public $fieldTypes;

    public $fieldTitle;
    public $fieldKey;
    public $selectedFieldType;
    public $fieldForm;
    public $fieldProps;

    public $refresh = false;

    public function mount()
    {
        $this->options = Option::all();
        $this->option = null;
        $this->fieldTitle = "";
        $this->fieldKey = "";
        $this->fieldTypes = config("settings-ui.field_types", []);
        $this->fieldForm = "";
        $this->fieldProps = [];
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
        $this->refresh = !$this->refresh;
    }

    public function addNewField()
    {
        Settings::create(
            $this->fieldKey,
            "",
            $this->fieldTitle,
            $this->selectedFieldType,
            json_encode($this->fieldProps)
        );
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
