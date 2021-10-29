<div class="container py-4 mr-auto">
    <style>
        .settings-input {
            display: flex;
            align-items: center;
            margin-bottom: 0;
            padding: 0;
        }

        .settings-input>label {
            flex-basis: 25%;
            margin-bottom: 0;
            font-weight: 500;
        }

        .settings-input input {
            box-shadow: none;
        }

    </style>
    @foreach ($options as $option)
        <div class="p-4 mb-2 bg-white rounded-lg">
            @php
                $component = 'paksuco-settings::' . strtolower(class_basename($option->field_type));
            @endphp
            @livewire($component, [
            "title" => __($option->field_title),
            "key" => $option->field_key,
            "model" => "values.".$option->field_key,
            "props" => json_decode($option->field_properties, true),
            "value" => $option->field_value
            ], key($option->field_key))
        </div>
    @endforeach
</div>
