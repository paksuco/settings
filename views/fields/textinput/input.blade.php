<div class='w-full md:w-full px-3 mb-4 settings-input'>
    <label class='font-semibold mb-2'>{{$tiTitle}}</label>
    <input wire:model.debounce.500ms='tiValue' {{isset($tiProps['readonly']) ? 'readonly' : ''}}
            {{isset($tiProps['required']) ? 'required' : ''}}
            {{isset($tiProps['disabled']) ? 'disabled="disabled"' : ''}}
            {{isset($tiProps['default']) ? 'value="'. $tiProps['default'] . '"' : ''}}
            {{isset($tiProps['maxlength']) ? 'value="'. $tiProps['maxlength'] . '"' : ''}}
            name="{{$tiKey}}"
            class='bg-white border w-full block rounded shadow
        placeholder-gray-800 py-2 px-3 text-gray-700 flex-1 leading-tight
        focus:border-cool-gray-300 border-cool-gray-200 min-w-0 relative text-sm focus:outline-none' type='text'>
</div>
