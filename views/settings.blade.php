@extends($extends)
@section("content")
<div class="p-8 border-t">
    <div class="items-end w-full">
        <h2 class="mb-3 text-3xl font-semibold" style="line-height: 1em">@lang("Site Settings")</h2>
        <p class="mb-4 text-sm font-light leading-5 text-gray-600"></p>
        @livewire("paksuco-settings::settings")
    </div>
</div>
@endsection
