<div class='w-full md:w-full px-3 mb-2 settings-input'>
    <label class="inline-flex items-center mt-3">
        <input type="checkbox" name="{{$tiKey}}" wire:model="{{$tiModel}}"
            class="form-checkbox shadow h-5 w-5 text-indigo-600"
            wire:model.debounce.500ms='tiValue'
            {{isset($tiProps['readonly']) ? 'readonly' : ''}}
            {{isset($tiProps['required']) ? 'required' : ''}}
            {{isset($tiProps['disabled']) ? 'disabled="disabled"' : ''}}
            {{isset($tiProps['default']) ? ( $tiProps['default'] ? 'checked' : '' ) : ''}}>
        <span class="ml-2 text-gray-700">{{$tiTitle}}</span>
    </label>
</div>