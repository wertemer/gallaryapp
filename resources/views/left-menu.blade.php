<ul>
    @if(session()->has('login'))
        <li class="btn btn-dark" style="width:200px">
            <a href="/admin-panel/gallary-list/{{ $type_id }}/{{ $lang_id }}/0">
                Все
            </a>
        </li>
        @foreach($data as $item)
        &nbsp;
        <li class="btn btn-dark" style="width:200px">
            <a href="/admin-panel/gallary-list/{{ $type_id }}/{{ $lang_id }}/{{ $item->id }}">
                {{ $item->name }}
            </a>
        </li>
        @endforeach
    @else 
        <li class="btn btn-dark" style="width:200px">
            <a href="/site-panel/gallary-list/{{ $type_id }}/{{ $lang_id }}/0">
                Все
            </a>
        </li>
        @foreach($data as $item)
        &nbsp;
        <li class="btn btn-dark" style="width:200px">
            <a href="/site-panel/gallary-list/{{ $type_id }}/{{ $lang_id }}/{{ $item->id }}">
                {{ $item->name }}
            </a>
        </li>
        @endforeach
    @endif   
</ul>
