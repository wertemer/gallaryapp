
<div class="container">
    <div class="row">
        <div class="col-md-12"><h4>Создание контента</h4></div>
    </div>                    
    <div class="row"> 
        <div class="col-md-12">
            <form action="{{ url('createcontent') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <input type='submit' value='Сохранить' class='btn btn-primary'>
                </div>
            </div>
            <div class="row">
            <div class="col-md-3">
                <input type="hidden" value="{{ $isnew }}" id="isnew" name="isnew">
                <div class="row" id="type-content-frm">
                    <fieldset>
                        <legend>Тип контента</legend>
                        @foreach($types as $type)
                        <div class="row">
                            <div class="col-sm-6">
                                @if($isnew=='1')
                                    @if($type->name=='Галерея')
                                    <input type="radio" class="form-control" name="gallary" value="{{ $type->id }}" checked>
                                    @else
                                    <input type="radio" class="form-control" name="gallary" value="{{ $type->id }}">
                                    @endif
                                @else
                                <input type="radio" class="form-control" name="gallary" value="{{ $type->id }}">
                                @endif
                            </div>
                            <div class="col-sm-6">
                            <label for="gallary" id="gal-{{ $type->id }}">  
                                {{ $type->name }}
                            </label>
                            </div>
                        </div>
                        @endforeach
                    </fieldset>
                </div>
            </div>
            <div class="col-md-9">
                <fieldset>
                    <legend>Описание</legend>
                    <label for="name">Название:</label>
                    <input id="gallary" name="name" type="text" class="form-control" required>
                    <label for="lang">Язык:</label>
                    <select id="lang" name="lang" class="form-control" required>
                        @foreach($langs as $lang)
                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                        @endforeach
                    </select>
                    <label for="desc" >Kраткое описание:</label>
                    <textarea name="desc" id="desc" row="10" col="300" class="form-control" required></textarea>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <fieldset >
                    <legend>Тэги</legend>
                    @foreach($genres as $genre)
                        <label for="tgs[]">
                            <input type="checkbox" class="form-control" name="tgs[]" value="{{ $genre->id }}">
                            {{ $genre->name }}
                        </label>
                    @endforeach
                </fieldset>
            </div>
        </div>
        <div class="row" id="dirs">
            <div class="col-md-12">
                <fieldset>
                    <legend>Путь к изображениям:</legend>
                    <input id="path" name="path[]" type="file" value="Загрузить" class="form-control-file" multiple>
                </fieldset>
            </div>
        </div>
        <div class="row" id="text">
            <div class="col-md-12">
                <fieldset>
                    <legend>Текст:</legend>
                    <textarea name="text" id="text" row="100" col="1000" class="form-control"></textarea>
                </fieldset>
            </div>
        </div>
        </form>
        </div>
    </div>
</div>

