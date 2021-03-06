<div class="relative mb-4 text-sm text-left" x-data="{erroropen: true}" @message-processed.window="erroropen = true" id="error-indicator"
    x-show="erroropen">
    <div class="flex items-center bg-{{$color}}-100 text-{{$textcolor}} text-sm
        font-semibold rounded px-4 py-3 border border-{{$color}}-300 pr-10"
        role="alert">
        <i class="{{$icon}} mr-3 mt-1 fa-2x leading-none"></i>
        <div>{!! $slot !!}</div>
        <span class="absolute inset-y-0 right-0 px-4 py-5 leading-none cursor-pointer" @click='erroropen = false'>
            <i class="fa fa-times text-{{$textcolor}}"></i>
        </span>
    </div>
</div>