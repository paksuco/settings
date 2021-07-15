<div class='w-full px-3 mb-4 md:w-full settings-input'>
    <label class='mb-2 font-semibold'>{{$tiTitle}}</label>
    <select
        @if(!empty($tiModel)) wire:model.lazy='tiValue' @endif
        name="{{$tiKey}}" x-ref="{{$tiKey}}"
        class="relative flex-1 block w-full min-w-0 px-3 py-2 text-sm leading-tight text-gray-700 placeholder-gray-800 bg-white border rounded shadow focus:border-cool-gray-300 border-cool-gray-200 focus:outline-none">
        <option value='{{$tiProps["emptyValue"] ?? ""}}'>{{$tiProps["emptyTitle"] ?? __("Select a value")}}</option>
        @foreach($tiProps["values"] as $key => $value)
        <option value='{{$key}}'>{{ $value }}</option>
        @endforeach
    </select>
</div>
