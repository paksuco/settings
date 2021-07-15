<div class="flex">
    <div class="flex-shrink-0 w-full p-6 rounded md:w-80 bg-cool-gray-100">
        <div class="sticky top-0">
            @include("actionresult")
            <h3 class="mb-3 text-2xl font-semibold" style="line-height: 1em">
                @if ($optionId == null)
                    @lang("Add new Field")
                @else
                    @lang("Edit Field")
                @endif
            </h3>
            <div class='flex flex-wrap -mx-3 text-sm'>
                @include('paksuco-settings::admin.editor')
                <div class="flex justify-between w-full px-3 mt-3">
                    @if ($optionId)
                        <button type="button"
                            class="px-3 py-2 font-bold text-red-500 whitespace-no-wrap bg-white rounded shadow hover:bg-cool-gray-100 mr2 focus:shadow-outline focus:outline-none"
                            wire:click="clearSelection">@lang('Cancel')</button>
                    @endif
                    <button type="button"
                        class="px-3 py-2 font-bold text-white whitespace-no-wrap bg-indigo-500 rounded shadow hover:bg-indigo-400 focus:shadow-outline focus:outline-none"
                        wire:click="addNewField">@lang('Save Field')</button>
                </div>
            </div>
            &nbsp;
        </div>
    </div>
    <div class="flex-1 p-6">
        <h3 class="mb-3 text-2xl font-semibold" style="line-height: 1em">@lang("Defined Fields")</h3>
        <table class="table w-full text-sm border-collapse">
            <thead>
                <tr>
                    <th class="px-2 py-1 text-lg font-bold text-left bg-cool-gray-200 text-cool-gray-800">@lang('Field
                        Title')<br>@lang('Field Key')</th>
                    <th class="px-2 py-1 text-lg font-bold text-left bg-cool-gray-200 text-cool-gray-800">@lang('Field
                        Type')</th>
                    <th class="px-2 py-1 text-lg font-bold text-left bg-cool-gray-200 text-cool-gray-800">@lang('Field
                        Properties')</th>
                    <th class="px-2 py-1 text-lg font-bold text-left bg-cool-gray-200 text-cool-gray-800">
                        @lang('Actions')</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($options as $option)
                    <tr class="border-cool-gray-300 {{ $loop->last == false ? 'border-b' : '' }}">
                        <td class="w-1/3 p-2 whitespace-no-wrap"><b class="text-lg font-semibold">
                                {{ $option->field_title }}
                            </b><br>{{ $option->field_key }}</td>
                        <td class="w-1/3 p-2 whitespace-no-wrap bg-cool-gray-100">
                            {{ class_basename($option->field_type) }}</td>
                        <td class="w-1/3 p-2 whitespace-no-wrap">
                            <dl>
                                @php
                                    $props = json_decode($option->field_properties, true);
                                    $propsCount = count($props);
                                @endphp
                                @foreach ($props as $property => $value)
                                    <div
                                        class='flex @if ($loop->iteration < $propsCount) border-b border-cool-gray-200 @endif'>
                                        <dt class="w-20 py-2"><b>{{ $property }}: </b></dt>
                                        <dd class="py-2">{{ is_bool($value) ? ($value ? 'true' : 'false') : $value }}
                                        </dd>
                                    </div>
                                @endforeach
                            </dl>
                        </td>
                        <td class="p-2 whitespace-no-wrap align-top bg-cool-gray-100">
                            <button type="button" wire:click="edit('{{ $option->field_key }}')"
                                class="px-3 py-2 font-bold text-white whitespace-no-wrap bg-blue-700 rounded shadow hover:bg-indigo-400 focus:shadow-outline focus:outline-none">
                                <i class="mr-2 fa fa-pen"></i>@lang("Edit")
                            </button>
                            <button type="button" onclick="confirm('Are you sure you want to remove this setting?') || event.stopImmediatePropagation()" wire:click="delete('{{ $option->field_key }}')"
                                class="px-3 py-2 font-bold text-white whitespace-no-wrap bg-red-700 rounded shadow hover:bg-indigo-400 focus:shadow-outline focus:outline-none">
                                <i class="mr-2 fa fa-trash-alt"></i>@lang("Delete")</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-3">@lang('There are currently no fields defined. You can define some
                            using the form below.')</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
