<div class="py-4 border-b">
    <style>
        .settings-input {
            display: flex;
            align-items: center;
        }
        .settings-input > label {
            flex-basis: 30%;
            margin-bottom: 0;
            font-weight: 500;
        }
        .settings-input input {
            box-shadow: none;
        }
    </style>
    @foreach($options as $option)
    <div>
        @php
        $component = "paksuco-settings::" .
        strtolower(class_basename($option->field_type));
        @endphp
        @livewire($component, [
        "title" => $option->field_title,
        "key" => $option->field_key,
        "model" => "values.".$option->field_key,
        "value" => $option->field_value
        ], key($option->field_key))
    </div>
    @endforeach
</div>