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
                @foreach($data['tags'] as $tag)
                    @if(session()->has('login'))                
                    <div class="d-inline">
                        <a href="/admin-panel/gallary-list/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                            {{ $tag->name }}
                        </a>
                    </div>
                    @else
                    <div class="d-inline">
                        <a href="/site-panel/gallary-list/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $tag->genre_id }}" class="btn btn-secondary">
                            {{ $tag->name }}
                        </a>
                    </div>                
                    @endif
                @endforeach
            <!--div class="gallery-container">
                <div class="tz-gallery"-->
                @foreach($data['files'] as $files) 
                    @foreach($files as $file)
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="lightbox" href="{{ Storage::url(''.$file) }}">
                                <img src="{{ Storage::url(''.$file) }}" alt="" title="" class="img-thumbnail shadow-sm"/>
                            </a>                                
                        </div>
                    </div>
                    @endforeach
                @endforeach
                <!--/div>  
            </div-->
        </div>
    </div>

</div>
