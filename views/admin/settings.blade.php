<div class="py-4 container mr-auto">
    <style>
        .settings-input {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            padding: 0;
        }
        .settings-input > label {
            flex-basis: 25%;
            margin-bottom: 0;
            font-weight: 500;
        }
        .settings-input input {
            box-shadow: none;
        }
    </style>
    @foreach($options as $option)
    <div class="rounded-lg bg-white mb-2 p-4">
        @php
        $component = "paksuco-settings::" .
        strtolower(class_basename($option->field_type));
        @endphp
        @livewire($component, [
        "title" => $option->field_title,
        "key" => $option->field_key,
        "model" => "values.".$option->field_key,
        "props" => json_decode($option->field_properties, true),
        "value" => $option->field_value
        ], key($option->field_key))
    </div>
    @endforeach
</div>