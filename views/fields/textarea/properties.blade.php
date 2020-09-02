@livewire("paksuco-settings::textinput", [
    "title" => "Max Length",
    "key" => "maxlength",
    "model" => "fieldProps.maxlength",
    "value" => ""
], key("text-input-props-maxlength".$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Columns",
    "key" => "cols",
    "model" => "fieldProps.cols",
    "value" => ""
], key("text-input-props-cols".$random))

@livewire("paksuco-settings::textinput", [
    "title" => "Rows",
    "key" => "rows",
    "model" => "fieldProps.rows",
    "value" => ""
], key("text-input-props-rows".$random))

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
    "value" => ""
], key("text-input-props-required".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Disabled",
    "key" => "disabled",
    "model" => "fieldProps.disabled",
    "value" => ""
], key("text-input-props-disabled".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Read-only",
    "key" => "readonly",
    "model" => "fieldProps.readonly",
    "value" => ""
], key("text-input-props-readonly".$random))
