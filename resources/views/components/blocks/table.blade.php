<div class="block">
    @php
        $counter = 0;
    @endphp
    <table>
        @foreach ($block->data->content as $row)
            @if ($block->data->withHeadings && $counter == 0)
                <thead>
                    <tr>
                        @foreach ($row as $item)
                            <th>{!! $item !!}</th>
                        @endforeach
                    </tr>
                </thead>
            @endif
            <tr>
                @foreach ($row as $item)
                    <td>{!! $item !!}</td>
                @endforeach
            </tr>
            @php
                $counter++
            @endphp
        @endforeach
    </table>
</div>