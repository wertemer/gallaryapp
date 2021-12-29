<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Вход</title>
        <link href='{{ asset("css/bootstrap.min.css") }}' rel="stylesheet">
    </head>
    <body>
        <div class="container d-flex h-100">
            <div class="row">
                <div class="col-md-12"><h3>Вход</h3></div>
            </div>
            <div class="row align-item-center w-100">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="{{ url('logining') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <!--Вывод ошибок валидации формы-->                                
                                @foreach (['danger', 'warning', 'success', 'info', 'error'] as $msg)
                                    <div class="flash-{{ $msg }}" role='alert'>
                                    @if(Session::has('alert-' . $msg))                                        
                                        <p class="alert alert-{{ $msg }}">
                                            {{ Session::get('alert-' . $msg) }} 
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        </p>
                                    @endif
                                    </div>
                                @endforeach
                                 <!-- end .flash-message -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                     <ul>
                                         @foreach($errors->all() as $error)
                                             <li>{{ error }}</li>
                                         @endforeach
                                     </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <!--поля формы-->
                        <div class="row">
                            <div class="col-md-12">
                                <label for="login">Логин:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input name="login" type="text" class="@error('login') is-invalid @enderror form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="password">Пароль:</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input name="password" type="password" class="@error('password') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">                            
                            <div class="col-md-5"><a href="{{ url('/registration') }}" class="btn btn-primary">Регистрация</a></div>
                            <div class="col-md-3"><input type="submit" value="Войти" class="btn btn-primary"></div>
                            <div class="col-md-4"><input type="button" value="Отмена" class="btn btn-secondary"></div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <script src='{{ asset("js/jquery-3.6.0.js") }}'></script>
        <script src='{{ asset("js/bootstrap.min.js") }}'></script>
    </body>
</html>