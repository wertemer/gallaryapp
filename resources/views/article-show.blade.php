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
            @foreach($data['article-show'] as $content)
                <div class='row'>
                    <div class="col-md-12">
                        <h4>{{ $content->name }}</h4>
                        @foreach($data['tags'] as $tag)
                            @if(session()->has('login'))                
                            <div class="d-inline">
                                <a href="/admin-panel/gallary-list/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                                    {{ $tag->name }}
                                </a>
                            </div>
                            @else
                            <div class="d-inline">
                                <a href="/site-panel/gallary-list/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                                    {{ $tag->name }}
                                </a>
                            </div>                
                            @endif
                        @endforeach
                    </div>                
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        {{ $data['text'] }}
                    </div>
                </div>                
            @endforeach
        </div>
    </div>
</div>

