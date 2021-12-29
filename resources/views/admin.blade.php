<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Административная панель</title>
        <link href='{{ asset("css/bootstrap.min.css") }}' rel="stylesheet">
        <link href='{{ asset("css/baguetteBox.css") }}' rel="stylesheet">
        <link href='{{ asset("css/gallary-grid.css") }}' rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('admin-menu')                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            @if(array_key_exists('users',$data))
                @include('users-list',['data'=>$data])
            @elseif(array_key_exists('types',$data)) 
                @include('types-list',['data'=>$data])
            @elseif(array_key_exists('create-type',$data))
                @include('create-type',['data'=>$data])
            @elseif(array_key_exists('change-type',$data))
                @include('change-type',['data'=>$data])
            @elseif(array_key_exists('lang',$data))
                @include('lang-list',['data'=>$data])
            @elseif(array_key_exists('create-lang',$data))
                @include('create-lang',['data'=>$data])
            @elseif(array_key_exists('change-lang',$data))
                @include('change-lang',['data'=>$data])
            @elseif(array_key_exists('genre',$data))
                @include('genre-list',['data'=>$data])
            @elseif(array_key_exists('create-genre',$data))
                @include('create-genre',['data'=>$data])
            @elseif(array_key_exists('change-genre',$data))
                @include('change-ganre',['data'=>$data])
            @elseif(array_key_exists('articles',$data) && $data['type_id']==config('constants.Stories'))
                @include('articles',['data'=>$data])
            @elseif(array_key_exists('articles',$data) && $data['type_id']==config('constants.Gallary'))
                @include('gallaries',['data'=>$data])
            @elseif(array_key_exists('articles',$data) && $data['type_id']==config('constants.Comix'))
                @include('comixes',['data'=>$data])
            @elseif(array_key_exists('content-create',$data))
                @include('form-arcticle',[
                    'types'=>$data['types-cont'],
                    'genres'=>$data['genres-cont'],
                    'langs'=>$data['lang-cont'],
                    'isnew'=>'1'
                ])
            @elseif(array_key_exists('gallary-show',$data))
                @include('gallary-show',['data'=>$data])
            @elseif(array_key_exists('comix-show',$data))
                @include('comix-show',['data'=>$data])
            @elseif(array_key_exists('article-show',$data))
                @include('article-show',['data'=>$data])
            @else
                @include('last-contents',['data'=>$data])
            @endif
        </div>
        <script src='{{ asset("js/jquery-3.6.0.js") }}'></script>
        <script src='{{ asset("js/bootstrap.min.js") }}'></script>
        @if(array_key_exists('content-create',$data))
            <script src='{{ asset("js/form-arcticle.js") }}'></script>
        @endif
        <script src='{{ asset("js/baguetteBox.js") }}'></script>
        <script>
            baguetteBox.run('.tz-gallery');
        </script>
    </body>
</html>