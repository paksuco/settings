<div class='w-full px-3 mb-2 md:w-full settings-input'>
    <label class="inline-flex items-center mt-3">
        <input type="checkbox" name="{{ $tiKey }}" x-ref="{{ $tiKey }}"
            class="w-5 h-5 text-indigo-600 shadow form-checkbox" @if (!empty($tiModel)) wire:model.lazy='tiValue' @endif
            {{ isset($tiProps['readonly']) && $tiProps['readonly'] ? 'readonly' : '' }}
            {{ isset($tiProps['required']) && $tiProps['required'] ? 'required' : '' }}
            {{ isset($tiProps['disabled']) && $tiProps['disabled'] ? 'disabled="disabled"' : '' }}
            {{ isset($tiProps['default']) && $tiProps['default'] ? ($tiProps['default'] ? 'checked' : '') : '' }}>
        <span class="ml-2 text-gray-700">{{ $tiTitle }}</span>
    </label>
</div>
