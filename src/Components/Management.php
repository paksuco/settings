<?php

namespace Paksuco\Settings\Components;

use Illuminate\Support\Str;
use Paksuco\Settings\Models\Option;
use Paksuco\Settings\Traits\HasDynamicSettings;

class Management extends \Livewire\Component
{
    public $options;
    public $option;

    public $selectedFieldType;
    public $fieldTypes;

    public $fieldTitle;
    public $fieldKey;

    use HasDynamicSettings;

    public function mount()
    {
        $this->options = Option::all();
        $this->option = null;
        $this->fieldTitle = "";
        $this->fieldKey = "";
        $this->fieldTypes = config("settings-ui.field_types", []);
    }

    public function updatedSelectedFieldType()
    {
        $this->fieldForm = $this->selectedFieldType == '' ?
        '' :
        (
            method_exists($this->selectedFieldType, "propertiesForm") ?
            $this->selectedFieldType::propertiesForm() :
            ''
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
