<div class="flex">
    <div class="w-full md:w-1/3 p-6 bg-cool-gray-100 rounded">
        <h3 class="text-2xl font-semibold mb-3" style="line-height: 1em">@lang("Add new Field")</h3>
        <div class='flex flex-wrap -mx-3 mb-6 text-sm'>
            @livewire("paksuco-settings::textinput", ["title" => "Field Title", "value" => "", "model" => "fieldTitle"], key('fieldTitle-22'))
            @livewire("paksuco-settings::textinput", ["title" => "Field Key", "value" => "", "model" => "fieldKey"], key('fieldKey-22'))
            <div class='w-full md:w-full px-3 mb-4'>
                <label class='font-semibold mb-2'>Field Type</label>
                <select wire:model='selectedFieldType'
                        class="bg-white border w-full block rounded shadow
                            placeholder-gray-800 py-2 px-3 text-gray-700 flex-1 leading-tight
                            focus:border-cool-gray-300 border-cool-gray-200 min-w-0 relative text-sm focus:outline-none">
                    <option value=''>Select a field type</option>
                    @foreach($fieldTypes as $fieldType)
                    <option value='{{$fieldType}}'>{{ $fieldType::getFieldName() }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-full px-3 mb-4">

            </div>
        </div>

    </div>
    <div class="w-full md:w-2/3 p-6">
        <h3 class="text-2xl font-semibold mb-3" style="line-height: 1em">@lang("Defined Fields")</h3>
        <table class="table text-sm border-collapse w-full">
            <thead>
                <tr>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field Name
                    </th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field Type
                    </th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Field
                        Properties</th>
                    <th class="bg-gray-700 py-1 px-3 text-left font-normal border-white border-2 text-white">Current
                        Value</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($options as $option)
                <tr class="{{ $loop->last == false ? 'border-b' : '' }}">
                    <td class="p-3">{{$option->field_name}}</td>
                    <td class="p-3">{{$option->field_type}}</td>
                    <td class="p-3">{!! dump($option->properties) !!}</td>
                    <td class="p-3">{{$option->field_value}}</td>
                    <td class="p-3">
                        <button type="button" wire:click='edit({{$option->id}})'>Edit</button>
                        <button type="button" wire:click='delete({{$option->id}})'>Delete</button>
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
