<div class="flex">
    <div class="w-full md:w-1/3 p-6 bg-cool-gray-100 rounded">
        <h3 class="text-2xl font-semibold mb-3" style="line-height: 1em">@lang("Add new Field")</h3>
        <div class='flex flex-wrap -mx-3 text-sm'>
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

            <div class="px-3 w-full text-right">
                <button type="button"
                    class="shadow bg-indigo-500 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline
                        focus:outline-none text-white font-bold py-2 px-3 rounded"
                    wire:click="addNewField">Save Field</button>
            </div>
        </div>

    </div>
    <div class="w-full md:w-2/3 p-6">
        <h3 class="text-2xl font-semibold mb-3" style="line-height: 1em">@lang("Defined Fields")</h3>
        <table class="table text-sm border-collapse w-full">
            <thead>
                <tr>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field Title
                    <br>Field Key
                    </th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field Type
                    </th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field
                        Properties</th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($options as $option)
                <tr class="{{ $loop->last == false ? 'border-b' : '' }}">
                    <td class="p-3">{{$option->field_title}}<br>{{$option->field_key}}</td>
                    <td class="p-3">{{class_basename($option->field_type)}}</td>
                    <td class="p-3 whitespace-pre-line font-mono">@php print_r(json_decode($option->field_properties)); @endphp</td>
                    <td class="p-3">
                        <button
                    type="button"
                    wire:click="edit('{{$option->field_key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-blue-700 hover:text-blue-900
                    font-normal rounded p-1">
                    <i class="fa fa-pencil"></i>
                </button>
                        <button type="button" wire:click='delete("{{$option->field_key}}")'>Delete</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-3">There are currently no fields defined. You can define some using the
                        form below.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
