<div class="block">
    <div class="checklist">
        @foreach ($block->data->items as $item)
            <div class="checklist-item">
                <input type="checkbox" {{ $item->checked ? 'checked' : '' }} /> {{ $item->text }}
            </div>
        @endforeach
    </div>
</div>