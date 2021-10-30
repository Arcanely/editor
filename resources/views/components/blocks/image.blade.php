<div class="block image">
    @php
        $classes = [];
        if ($block->data->withBorder) {
            array_push($classes, 'border');
        }
        if ($block->data->withBackground) {
            array_push($classes, 'background');
        }
        if ($block->data->stretched) {
            array_push($classes, 'stretched');
        }
        $classes = join(' ', $classes);
    @endphp
    <div class="{{ $classes }}">
        <img src="{{ $block->data->url }}" alt="{{ $block->data->caption }}" />
    </div>
</div>