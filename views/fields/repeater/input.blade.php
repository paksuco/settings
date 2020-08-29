<div class='w-full md:w-full px-3 mb-4 settings-input'>
    <label class='font-semibold mb-2'>{{$tiTitle}}</label>
    <table class="mb-2 bg-white shadow rounded p-4 w-full">
        <thead>
            <tr>
                <th class="bg-cool-gray-700 border-b text-cool-gray-100 font-semibold py-1 px-3 text-left rounded-tl">Key</th>
                <th class="bg-cool-gray-700 border-b text-cool-gray-100 font-semibold py-1 px-3 text-left">Value</th>
                <th class="bg-cool-gray-700 border-b text-cool-gray-100 font-semibold py-1 px-3 text-left rounded-tr">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
    @foreach($items as $key => $item)
        <tr class='{{ $loop->even ? "bg-cool-gray-100" : "bg-white" }}''>
            <td class="px-3 py-1">{{$key}}</td>
            <td class="px-3 py-1 w-full">{{$item}}</td>
            <td class="pl-3 pr-1 py-1 flex">
                <button
                    type="button"
                    wire:click="moveItemUp('{{$key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-gray-700 hover:text-gray-900
                    font-normal rounded p-1">
                    <i class="fa fa-chevron-up"></i>
                </button>
                <button
                    type="button"
                    wire:click="moveItemDown('{{$key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-gray-700 hover:text-gray-900
                    font-normal rounded p-1">
                    <i class="fa fa-chevron-down"></i>
                </button>
                <button
                    type="button"
                    wire:click="deleteItem('{{$key}}')"
                    class="btn-primary transition duration-300 ease-in-out focus:outline-none
                    focus:shadow-outline text-red-700 hover:text-red-900
                    font-normal rounded p-1">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>
    <label class='font-semibold mb-2'>Key</label>
    <input wire:model.debounce.500ms='tiKey'
        class='bg-white border w-full block rounded shadow placeholder-gray-800
            py-2 px-3 text-gray-700 flex-1 leading-tight focus:border-cool-gray-300
            border-cool-gray-200 min-w-0 relative text-sm focus:outline-none mb-2'
        type='text'>
    <label class='font-semibold mb-2'>Value</label>
    <input wire:model.debounce.500ms='tiValue'
        class='bg-white border w-full block rounded shadow placeholder-gray-800
            py-2 px-3 text-gray-700 flex-1 leading-tight focus:border-cool-gray-300
            border-cool-gray-200 min-w-0 relative text-sm focus:outline-none mb-2'
        type='text'>
    <button type="button"
    class="mt-2 transition duration-300 ease-in-out focus:outline-none focus:shadow-outline bg-purple-700 hover:bg-purple-900 text-white font-normal py-1 px-3 mr-1 rounded"
    wire:click="addItem">Add Item</button>
</div>
