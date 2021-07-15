<div class='w-full px-3 mb-4 md:w-full settings-input'>
    <label class='mb-2 font-semibold'>{{$tiTitle}}</label>
    <textarea
       @if(!empty($tiModel)) wire:model.lazy='tiValue' @endif {{isset($tiProps['readonly']) ? 'readonly' : ''}} x-ref="{{$tiKey}}"
            {{isset($tiProps['required']) && $tiProps['required'] == true ? 'required' : ''}}
            {{isset($tiProps['disabled']) && $tiProps['disabled'] == true ? 'disabled="disabled"' : ''}}
            {{isset($tiProps['maxlength']) ? 'maxlength="'. $tiProps['maxlength'] . '"' : ''}}
            {{isset($tiProps['rows']) ? 'rows='. $tiProps['rows'] : ''}}
            {{isset($tiProps['cols']) ? 'cols='. $tiProps['cols'] : ''}}
            name="{{$tiKey}}"
            class='relative flex-1 block w-full min-w-0 px-3 py-2 text-sm leading-tight text-gray-700 placeholder-gray-800 bg-white border rounded shadow focus:border-cool-gray-300 border-cool-gray-200 focus:outline-none'>
        {{isset($tiProps['default']) ? $tiProps['default'] : ''}}
    </textarea>
</div>
