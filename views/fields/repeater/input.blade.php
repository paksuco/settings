<div class='w-full px-3 mb-4 md:w-full settings-input'>
    <table class="w-full p-4 mb-4 bg-white rounded shadow">
        <thead>
            <tr>
                <th class="sticky top-0 p-2 px-4 text-sm font-semibold text-left uppercase whitespace-no-wrap bg-gray-100 border-b">@lang('Key')</th>
                <th class="sticky top-0 p-2 px-4 text-sm font-semibold text-left uppercase whitespace-no-wrap bg-gray-100 border-b">@lang('Value')</th>
                <th class="sticky top-0 p-2 px-4 text-sm font-semibold text-left uppercase whitespace-no-wrap bg-gray-100 border-b">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $key => $item)
            <tr class='{{ $loop->even ? "bg-cool-gray-100" : "bg-white" }}''>
            <td class="border-t border-gray-200 border-dashed"><span class="flex items-center px-4 py-3 text-gray-700 whitespace-pre-line">{{$key}}</span></td>
            <td class="border-t border-gray-200 border-dashed"><span class="flex items-center px-4 py-3 text-gray-700 whitespace-pre-line">{{$item}}</span></td>
            <td class="flex justify-end border-t border-gray-200 border-dashed">
                <span class="flex items-center px-4 py-3 text-gray-700 whitespace-pre-line">
                @if($loop->first == false)
                <button
                    type="button"
                    wire:click="moveItemUp('{{$key}}')"
                class="p-1 font-normal text-gray-700 transition duration-300 ease-in-out rounded btn-primary focus:outline-none focus:shadow-outline hover:text-gray-900">
                <i class="fa fa-chevron-up"></i>
                </button>
                @endif
                @if($loop->last == false)
                <button
                    type="button"
                    wire:click="moveItemDown('{{$key}}')"
                    class="p-1 font-normal text-gray-700 transition duration-300 ease-in-out rounded btn-primary focus:outline-none focus:shadow-outline hover:text-gray-900">
                    <i class="fa fa-chevron-down"></i>
                </button>
                @endif
                <button
                    type="button"
                    wire:click="deleteItem('{{$key}}')"
                    class="p-1 font-normal text-red-700 transition duration-300 ease-in-out rounded btn-primary focus:outline-none focus:shadow-outline hover:text-red-900">
                    <i class="far fa-trash-alt"></i>
                </button>
                </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="border-t border-gray-200 border-dashed">
                    <span class="flex items-center px-4 py-3 text-gray-700 whitespace-pre-line">@lang('No records found.')</span>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <label class='mb-2 font-semibold'>@lang('Key')</label>
    <input wire:model.lazy='keyInput'
        class='relative flex-1 block w-full min-w-0 px-3 py-2 mb-4 text-sm leading-tight text-gray-700 placeholder-gray-800 bg-white border rounded shadow focus:border-cool-gray-300 border-cool-gray-200 focus:outline-none'
        type='text'>
    <label class='mb-2 font-semibold'>@lang('Value')</label>
    <input wire:model.lazy='valueInput'
        class='relative flex-1 block w-full min-w-0 px-3 py-2 mb-4 text-sm leading-tight text-gray-700 placeholder-gray-800 bg-white border rounded shadow focus:border-cool-gray-300 border-cool-gray-200 focus:outline-none'
        type='text'>
    <button type="button"
        class="px-4 py-2 mr-1 font-normal text-white transition duration-300 ease-in-out bg-indigo-700 border-indigo-800 rounded shadow focus:outline-none focus:shadow-outline hover:bg-indigo-900"
        wire:click="addItem">@lang('Add Item')</button>
</div>
