<?php

namespace Paksuco\Settings\Components;

use Paksuco\Settings\Models\Option;
use Paksuco\Settings\Traits\HasDynamicSettings;

class Settings extends \Livewire\Component
{
    use HasDynamicSettings;

    public $options;
    public $values;

    public function mount()
    {
        $this->options = Option::all();
        $this->values = [];
    }

    public function updatedValues()
    {
        foreach ($this->values as $key => $value) {
            Option::where("field_key", "=", $key)
                ->update(["field_value" => $value]);
        }
    }

    public function render()
    {
        return view("paksuco-settings::admin.settings");
    }
}
