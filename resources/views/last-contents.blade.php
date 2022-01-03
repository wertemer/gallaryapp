<div class="container">
<div class="row"><div class="col-md-12"><h4>Последние рассказы</h4></div></div>
                    @foreach($data['articles_main'] as $content)
                    <div class="row">
                    <div class="col-md-1">{{ $loop->index+1 }}</div>
                    <div class="col-md-11">
                        <div class="row">
                            <div class="col-md-8">
                                <a href="/gallary/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}"><strong>{{ $content->name }}</strong></a>
                            </div>
                            <div class="col-md-4">
                                <strong>{{ $content->updated_at }}</strong>
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
                    </div>
                    </div>
                    @endforeach
                    <div class="row"><div class="col-md-12"><h4>Последние галереи</h4></div></div>
                    <div class="row">
                        <?php $i=1; ?>
                        @foreach($data['gallary_main'] as $content)
                        <?php if($i==1){?>                
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="/gallary/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                            {!! wordwrap($content->name,7,'<br>',false) !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @foreach($data['files'][$content->id] as $file)
                                        <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                        @break
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    <?php
                        $i=$i+1;
                    }elseif($i<4){  ?>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="/gallary/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                            {!! wordwrap($content->name,7,'<br>',false) !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @foreach($data['files'][$content->id] as $file)
                                        <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                        @break
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                    <?php
                        $i=$i+1;
                    }else{ ?>
                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <a href="/gallary/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                            {!! wordwrap($content->name,7,'<br>',false) !!}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        @foreach($data['files'][$content->id] as $file)
                                        <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                        @break
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                        $i=1;
                    }
                    ?>            
                        @endforeach
                    </div>
                    <div class="row"><div class="col-md-12"><h4>Последние комиксы</h4></div></div>
                    <?php $i=1; ?>
                    <div class="row">
                        @foreach($data['comix_main'] as $content)    
                        <?php if($i==1){?>                
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="/comix/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                                {!! wordwrap($content->name,13,'<br>',false) !!}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @foreach($data['files'][$content->id] as $file)
                                            <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                            @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        <?php
                            $i=$i+1;
                        }elseif($i<4){  ?>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="/comix/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                                {!! wordwrap($content->name,13,'<br>',false) !!}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @foreach($data['files'][$content->id] as $file)
                                            <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                            @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                        <?php
                            $i=$i+1;
                        }else{ ?>
                                <div class="col-sm-3">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <a href="/comix/{{ $content->type_id }}/{{ $content->lang_id }}/{{ $content->id }}">
                                                {!! wordwrap($content->name,7,'<br>',false) !!}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @foreach($data['files'][$content->id] as $file)
                                            <img src="{{ Storage::url(''.$file) }}" alt="{{ $content->name }}" title="{{ $content->desc }}" class="img-thumbnail shadow-sm"/>
                                            @break
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i=1;
                        }
                        ?>            
                    @endforeach
                    </div>
</div>
