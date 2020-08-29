@livewire("paksuco-settings::checkbox", [
    "title" => "Required",
    "key" => "required",
    "model" => "fieldProps.required",
    "value" => ""
], key("text-checkbox-props-required".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Disabled",
    "key" => "disabled",
    "model" => "fieldProps.disabled",
    "value" => ""
], key("text-checkbox-props-disabled".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Default Value",
    "key" => "default",
    "model" => "fieldProps.default",
    "value" => ""
], key("text-checkbox-props-default".$random))

@livewire("paksuco-settings::checkbox", [
    "title" => "Read-only",
    "key" => "readonly",
    "model" => "fieldProps.readonly",
    "value" => ""
], key("text-checkbox-props-readonly".$random))