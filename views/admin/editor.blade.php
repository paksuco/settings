<div class="w-full">
    @livewire("paksuco-settings::textinput", [
        "title" => "Field Title",
        "key" => "field_title",
        "value" => "",
        "model" => "fieldTitle"
    ], key('fieldTitle-22'))

    @livewire("paksuco-settings::textinput", [
        "title" => "Field Key",
        "key" => "field_key",
        "value" => "",
        "model" => "fieldKey"
    ], key('fieldKey-22'))

    @livewire("paksuco-settings::selectinput", [
        "title" => "Field Type",
        "key" => "field_type",
        "value" => "",
        "model" => "selectedFieldType",
        "props" => [
            "values" => collect($fieldTypes)->reduce(function($arr, $item){
                $arr[$item] = $item::getFieldName();
                return $arr;
            }, [])
        ]
    ], key('fieldType-22'))

    <form class="w-full">
        {!! $fieldForm !!}
    </form>
</div>
