<div class="blocks">
    @foreach ($blocks as $block)
    {{-- {{dd($blocks)}} --}}
        {{-- @if ($block->type == 'header') --}}
            @php
                $component = "arcanely::blocks.{$block->type}";
            @endphp
            <x-dynamic-component :component="$component" :block="$block" />
        {{-- @endif --}}
    @endforeach
</div>