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
                    <th class="bg-cool-gray-300 py-1 px-2 text-left font-normal text-cool-gray-800">Field Title
                    <br>Field Key
                    </th>
                    <th class="bg-cool-gray-300 py-1 px-2 text-left font-normal text-cool-gray-800">Field Type
                    </th>
                    <th class="bg-cool-gray-300 py-1 px-2 text-left font-normal text-cool-gray-800">Field
                        Properties</th>
                    <th class="bg-cool-gray-300 py-1 px-2 text-left font-normal text-cool-gray-800">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($options as $option)
                <tr class="border-cool-gray-300 {{ $loop->last == false ? 'border-b' : '' }}">
                    <td class="p-2 w-1/3 whitespace-no-wrap"><b class="text-lg font-semibold">
                        {{$option->field_title}}
                    </b><br>{{$option->field_key}}</td>
                    <td class="p-2 w-1/3 bg-cool-gray-100 whitespace-no-wrap">{{class_basename($option->field_type)}}</td>
                    <td class="p-2 w-1/3 whitespace-no-wrap">@dump(json_decode($option->field_properties))</td>
                    <td class="p-2  bg-cool-gray-100 whitespace-no-wrap">
                        <button
                            type="button"
                            wire:click="edit('{{$option->field_key}}')"
                            class="shadow bg-blue-700 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline
                            focus:outline-none text-white font-bold py-2 px-3 rounded">
                            <i class="fa fa-pen mr-2"></i>@lang("Edit")
                        </button>
                        <button type="button" wire:click="delete('{{$option->field_key}}')"
                            class="shadow bg-red-700 hover:bg-indigo-400 whitespace-no-wrap focus:shadow-outline
                            focus:outline-none text-white font-bold py-2 px-3 rounded">
                            <i class="fa fa-trash-alt mr-2"></i>@lang("Delete")</button>
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
