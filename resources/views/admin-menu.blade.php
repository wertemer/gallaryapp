<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
         
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Главная<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('admin-panel/users-list') }}">Пользователи</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Спрaвочники
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('admin-panel/types-list') }}">Тип контента</a>
                    <a class="dropdown-item" href="{{ url('admin-panel/lang-list') }}">Языки</a>
                    <a class="dropdown-item" href="{{ url('admin-panel/genre-list') }}">Жанры</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Контент
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ url('admin-panel/content-create') }}">Создать контент</a>
                    <a class="dropdown-item" href="{{ url('admin-panel/gallary-list') }}/<?php echo config('constants.Gallary');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>">Галерея</a>
                    <a class="dropdown-item" href="{{ url('admin-panel/gallary-list') }}/<?php echo config('constants.Stories');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>"">Рассказ</a>
                    <a class="dropdown-item" href="{{ url('admin-panel/gallary-list') }}/<?php echo config('constants.Comix');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>"">Комикс</a>
                </div>
            </li>
            <!--li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li-->
        </ul>
        @if(Session::has('login'))                                        
            <p style="color:#ffffff">
                {{ Session::get('login') }} 
            </p>
            &nbsp;
            <form class="form-inline my-2 my-lg-0" action="{{ url('logout') }}" metho="POST">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Выйти</button>
            </form>
        @else
            <!--Перенаправление-->
        @endif

    </div>
</nav>