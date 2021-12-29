<div class="container">
    <div class="row">
        <div class="col-md-3">
            <!--menu-->
            @include('left-menu',[
                'data'=>$data['tag_list'],
                'type_id'=>$data['type_id'],
                'lang_id'=>$data['lang_id']
            ])
        <?php $i=1; ?>
        </div>
        <div class="col-md-9">
        @foreach($data['articles'] as $content)    
            <?php if($i==1){?>                
                <div class="row">
                    <div class="col-sm-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="/comix/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $content->id }}">
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
                                <a href="/comix/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $content->id }}">
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
                                <a href="/comix/{{ $data['type_id'] }}/{{ $data['lang_id'] }}/{{ $content->id }}">
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
</div>



