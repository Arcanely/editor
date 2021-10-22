<div class="block">

    @php
        $listType = $block->data->style == 'unordered' ? 'ul' : 'ol'
    @endphp

    <{!! $listType !!}>

    {!! $recurseLists($block->data->items, $listType) !!}

    </{!! $listType !!}>
    
</div>