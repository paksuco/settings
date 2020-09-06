<div class='w-full md:w-full px-3 mb-4 settings-input'>
    <label class='font-semibold mb-2'>{{$tiTitle}}</label>
    <textarea
       @if(!empty($tiModel)) wire:model.debounce.500ms='tiValue' @endif {{isset($tiProps['readonly']) ? 'readonly' : ''}} x-ref="{{$tiKey}}"
            {{isset($tiProps['required']) && $tiProps['required'] == true ? 'required' : ''}}
            {{isset($tiProps['disabled']) && $tiProps['disabled'] == true ? 'disabled="disabled"' : ''}}
            {{isset($tiProps['maxlength']) ? 'maxlength="'. $tiProps['maxlength'] . '"' : ''}}
            {{isset($tiProps['rows']) ? 'rows='. $tiProps['rows'] : ''}}
            {{isset($tiProps['cols']) ? 'cols='. $tiProps['cols'] : ''}}
            name="{{$tiKey}}"
            class='bg-white border w-full block rounded shadow
        placeholder-gray-800 py-2 px-3 text-gray-700 flex-1 leading-tight
        focus:border-cool-gray-300 border-cool-gray-200 min-w-0 relative text-sm focus:outline-none'>
        {{isset($tiProps['default']) ? $tiProps['default'] : ''}}
    </textarea>
</div>
