<?php

namespace Paksuco\Settings\Components;

use Paksuco\Settings\Models\Option;

class Management extends \Livewire\Component
{

    public $options;
    public $option;

    public function mount()
    {
        $this->options = Option::all();
        $this->option = null;
    }

    public function render()
    {
        return view("paksuco-settings::admin.management");
    }
}
