@livewire("paksuco-settings::selectinput", [
    "title" => "Field Type",
    "key" => "type",
    "value" => "",
    "model" => "fieldProps.type",
    "props" => [
        "values" => ['text' => 'text', 'number' => 'number', 'tel' => 'tel', 'address' => 'address', 'date' => 'date', 'datetime' => 'datetime']
    ]
], key('text-input-props-type'.$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Min Length",
    "key" => "min",
    "model" => "fieldProps.min",
    "value" => 0
], key("text-input-props-min".$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Max Length",
    "key" => "max",
    "model" => "fieldProps.max",
    "value" => 100
], key("text-input-props-max".$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Step",
    "key" => "step",
    "model" => "fieldProps.step",
    "value" => 1
], key("text-input-props-step".$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Default Value",
    "key" => "default",
    "model" => "fieldProps.default",
    "value" => ""
], key("text-input-props-default".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Required",
    "key" => "required",
    "model" => "fieldProps.required",
    "value" => false
], key("text-input-props-required".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Disabled",
    "key" => "disabled",
    "model" => "fieldProps.disabled",
    "value" => false
], key("text-input-props-disabled".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Read-only",
    "key" => "readonly",
    "model" => "fieldProps.readonly",
    "value" => false
], key("text-input-props-readonly".$random))
