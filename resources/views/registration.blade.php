
<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Регистрация</title>
        <link href='{{ asset("css/bootstrap.min.css") }}' rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12"><h3>Регистрация</h3></div>
            </div>
            &nbsp;
            <div class="row">
                <div class="col-md-12">
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error}}</li>
                            @endforeach 
                        </ul>
                        </div>
                    @endif
                </div>
                <div class="col-md-12">
                    <!--Форма регистрации-->
                    <form action="{{ url('adduser') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-3"><label for="login">Логин:</label></div>
                            <div class="col-md-6"> 
                                <input name="login" type="text" class="@error('login') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-3"><label for="email">E-Mail:</label></div>
                            <div class="col-md-6"> 
                                <input name="email" type="email" class="@error('email') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-3"><label for="email-at">Повторите E-mail:</label></div>
                            <div class="col-md-6">
                                <input name="email-at" type="email" class="@error('email-at') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-3"><label for="password">Пароль:</label></div>
                            <div class="col-md-6"> 
                                <input name="password" type="password" class="@error('password') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-3"><label for="password-at">Пароль:</label></div>
                            <div class="col-md-6">
                                <input name="password-at" type="password" class="@error('password-at') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-3"><label for="remember">Напоминалка:</label></div>
                            <div class="col-md-6">
                                <input name="remember" type="text" class="@error('remember') is-invalid @enderror form-control">
                            </div>
                        </div>
                        &nbsp;
                        <div class="row">
                            <div class="col-md-12"><input type="submit" class="btn btn-primary" value="Зарегистрироваться"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src='{{ asset("js/jquery-3.6.0.js") }}'></script>
        <script src='{{ asset("js/bootstrap.min.js") }}'></script>
    </body>
</html>