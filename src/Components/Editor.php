<?php

namespace Paksuco\Settings\Components;

use Paksuco\Settings\Traits\HasDynamicSettings;

class Editor extends \Livewire\Component
{
    use HasDynamicSettings;

    public $fieldTypes;

    public $fieldTitle;
    public $fieldKey;
    public $selectedFieldType;
    public $fieldForm;
    public $fieldProps;

    public function mount()
    {
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

    public function render()
    {
        return view("paksuco-settings::admin.editor");
    }
}
