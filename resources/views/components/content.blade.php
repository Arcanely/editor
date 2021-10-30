@once
    @push('head')
        <link rel="stylesheet"  href="/arcanely-editor/css/main.css" />
    @endpush
@endonce
<div class="blocks">
    @foreach ($blocks as $block)
        @php
            $component = "arcanely::blocks.{$block->type}";
        @endphp
        <x-dynamic-component :component="$component" :block="$block" />
    @endforeach
</div>