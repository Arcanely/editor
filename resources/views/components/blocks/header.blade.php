<div class="block">
    @if (is_int($block->data->level))
        {!! "<h" . $block->data->level !!} id="{{ $block->data->anchor }}"{!! ">" !!}
            {{ $block->data->text }}
        {!! "</h" . $block->data->level . ">" !!}
    @endif
</div>