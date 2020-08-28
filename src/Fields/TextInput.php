<?php

namespace Paksuco\Settings\Fields;

use Paksuco\Settings\Models\Option;

class TextInput extends \Livewire\Component
{
    public $value;

    public function save()
    {
        $this->validate([
            "value" => "string"
        ]);

        $this->option->field_value = $this->value;
        $this->option->save();

        session()->flash("updated");
    }

    public function mount(Option $option)
    {
        $this->option = $option;
        $this->value = $option->field_value;
    }

    public function render()
    {
        return view("paksuco-settings::fields.textinput");
    }
}
