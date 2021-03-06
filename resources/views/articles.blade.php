<div class="container">
<div class="row">
<div class="col-md-3">
    <!--menu-->
    @include('left-menu',[
        'data'=>$data['tag_list'],
        'type_id'=>$data['type_id'],
        'lang_id'=>$data['lang_id']
    ])
</div>
<div class="col-md-9">
    @foreach($data['articles'] as $content)
    <div class="row">
        <div class="col-md-1">{{ $loop->index+1 }}</div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-8">
                    <a href="/gallary/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $content->id }}"><strong>{{ $content->name }}</strong></a>
                </div>
                <div class="col-md-4">
                    <strong>{{ $content->updated }}</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    {{ $content->desc }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <strong>Тэги:</strong>
                </div>
                <div class="col-md-10">
                    @foreach($data['tags'] as $tag)                    
                        @if($tag->id==$content->id)
                            @if(session()->has('login'))
                            <div class="d-inline">
                                <a href="/admin-panel/gallary-list/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                                    {{ $tag->genre_name }}
                                </a>
                            </div>
                            @else
                            <div class="d-inline">
                                <a href="/site-panel/gallary-list/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                                    {{ $tag->genre_name }}
                                </a>
                            </div>
                            @endif
                        @else
                            <div class="d-none">
                                <a href="{{ $tag->genre_id }}" class="btn btn-secondary">
                                    {{ $tag->genre_name }}
                                </a>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            @if(Session::has('login'))
            &nbsp;
            <div class="row">
                <div class="col-md-12">
                    <div class="d-inline">
                        <a href="/admin-panel/tochangearticle/{{ $content->id }}" class="btn btn-primary">Изменить</a>
                    </div>
                    <div class="d-inline">
                        <a href="/admin-panel/delgallary/{{ $content->id }}" class="btn btn-primary">Удалить</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endforeach
</div>
</div>
</div>