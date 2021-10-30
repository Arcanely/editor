<div class="block">
    <div class="alert alert-{{ $block->data->type }}">
        @if ($block->data->type == 'warning')
            <i class="fas fa-exclamation-triangle"></i>
        @elseif($block->data->type == 'danger')
            <i class="fas fa-exclamation-circle"></i>
        @elseif ($block->data->type == 'success')
            <i class="fas fa-check"></i>
        @elseif ($block->data->type == 'primary' || $block->data->type == 'secondary' || $block->data->type == 'info')
            <i class="fas fa-info-circle"></i>
        @endif
        {!! $block->data->message !!}
    </div>
</div>