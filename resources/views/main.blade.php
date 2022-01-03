<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Рассказы, комиксы, фото</title>
        <link href='{{ asset("css/bootstrap.min.css") }}' rel="stylesheet">
        <link href='{{ asset("css/baguetteBox.css") }}' rel="stylesheet">
        <link href='{{ asset("css/gallary-grid.css") }}' rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @include('site-menu')                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                @if(array_key_exists('articles',$data) && $data['type_id']==config('constants.Stories'))
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
            </div>
        </div>
        <script src='{{ asset("js/jquery-3.6.0.js") }}'></script>
        <script src='{{ asset("js/bootstrap.min.js") }}'></script>
        <script src='{{ asset("js/baguetteBox.js") }}'></script>
        <script>
            baguetteBox.run('.tz-gallery');
        </script>
    </body>
</html>