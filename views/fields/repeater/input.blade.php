<div class='w-full md:w-full px-3 mb-4 settings-input'>
    <table class="bg-white shadow rounded p-4 w-full mb-4">
        <thead>
            <tr>
                <th class="text-left whitespace-no-wrap text-sm uppercase font-semibold p-2 px-4
                bg-gray-100 sticky top-0 border-b">Key</th>
                <th class="text-left whitespace-no-wrap text-sm uppercase font-semibold p-2 px-4
                bg-gray-100 sticky top-0 border-b">Value</th>
                <th class="text-left whitespace-no-wrap text-sm uppercase font-semibold p-2 px-4
                bg-gray-100 sticky top-0 border-b">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @forelse($items as $key => $item)
            <tr class='{{ $loop->even ? "bg-cool-gray-100" : "bg-white" }}''>
            <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-4 py-3 flex items-center whitespace-pre-line">{{$key}}</span></td>
            <td class="border-dashed border-t border-gray-200"><span class="text-gray-700 px-4 py-3 flex items-center whitespace-pre-line">{{$item}}</span></td>
            <td class="border-dashed border-t border-gray-200 flex justify-end">
                <span class="text-gray-700 px-4 py-3 flex items-center whitespace-pre-line">
                @if($loop->first == false)
                <button
                    type="button"
                    wire:click="moveItemUp(' {{$key}}')"
                class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-gray-700 hover:text-gray-900
                    font-normal rounded p-1">
                <i class="fa fa-chevron-up"></i>
                </button>
                @endif
                @if($loop->last == false)
                <button
                    type="button"
                    wire:click="moveItemDown('{{$key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-gray-700 hover:text-gray-900
                    font-normal rounded p-1">
                    <i class="fa fa-chevron-down"></i>
                </button>
                @endif
                <button
                    type="button"
                    wire:click="deleteItem('{{$key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-red-700 hover:text-red-900
                    font-normal rounded p-1">
                    <i class="far fa-trash-alt"></i>
                </button>
                </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="10" class="border-dashed border-t border-gray-200">
                    <span class="text-gray-700 px-4 py-3 flex items-center whitespace-pre-line">No records found.</span>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <label class='font-semibold mb-2'>Key</label>
    <input wire:model.debounce.500ms='keyInput'
        class='bg-white border w-full block rounded shadow placeholder-gray-800
            py-2 px-3 text-gray-700 flex-1 leading-tight focus:border-cool-gray-300
            border-cool-gray-200 min-w-0 relative text-sm focus:outline-none mb-4'
        type='text'>
    <label class='font-semibold mb-2'>Value</label>
    <input wire:model.debounce.500ms='valueInput'
        class='bg-white border w-full block rounded shadow placeholder-gray-800
            py-2 px-3 text-gray-700 flex-1 leading-tight focus:border-cool-gray-300
            border-cool-gray-200 min-w-0 relative text-sm focus:outline-none mb-4'
        type='text'>
    <button type="button"
        class="transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-indigo-700 hover:bg-indigo-900 text-white font-normal py-2 px-4 mr-1 rounded shadow border-indigo-800"
        wire:click="addItem">Add Item</button>
</div>