<div class="block">
    <div class="checklist">
        @foreach ($block->data->items as $item)
            <div class="checklist-item">
                @php
                    $itemId = 'item-' . rand(0,10000);
                @endphp
                <input type="checkbox" {{ $item->checked ? 'checked' : '' }} id="{{ $itemId }}" /> <label for="{{ $itemId }}">{{ $item->text }}</label>
            </div>
        @endforeach
    </div>
</div>