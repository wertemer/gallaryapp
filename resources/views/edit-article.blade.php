

<div class="container">
    <div class="row">
        <div class="col-md-12"><h4>Редактирование рассказа</h4></div>
    </div>                   
    <div class="row"> 
        <div class="col-md-12">
            <form action="{{ url('changearticle') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12"><input type="submit"value="Сохранить" class="btn btn-primary"></div>
            </div>  
            <div class="row">
                <div class="col-md-12">
                    @foreach($data['article-edit'] as $content)
                    <input type="hidden" name="id" value="{{ $content->id }}">
                    <label for="name">Название</label>
                    <input type="text" id="name" name="name" value="{{ $content->name }}" class="form-control" required>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="lang">Язык</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <select id="lang" name="lang" class="form-control">
                                @foreach($data['lang_list'] as $lang)
                                    @foreach($data['article-edit'] as $content)
                                        @if($lang->id==$content->lang_id)
                                        <option value="{{ $lang->id }}" selected>{{ $lang->name }}</option>
                                        @else
                                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                        @endif
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach($data['article-edit'] as $content)
                    <label for="desc">Краткое описание</label>
                    <textarea name="desc" class="form-control" required>{{ $content->desc }}</textarea>
                    @endforeach
                </div>
            </div>
            <div class="row"><div class="col-md-12"><label>Жанры</label></div></div>
            <div class="row">
                <div class="col-md-12">
                    @foreach($data['tag_list'] as $tags)
                        @if(in_array($tags->id, $data['tags']))
                        <label for="tag[]">
                            <input type="checkbox" name="tag[]" class="form-control" value="{{ $tags->id }}" checked>
                            {{ $tags->name }}
                        </label>
                        @else
                        <label for="tag[]">
                            <input type="checkbox" name="tag[]" class="form-control" value="{{ $tags->id }}">
                            {{ $tags->name }}
                        </label>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <lable for="text">Текст рассказа</lable>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @foreach($data['article-edit'] as $content)
                    <textarea name="text" class="form-control" row="40" col="40" required>{{ $content->ttext }}</textarea>
                    @endforeach
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

