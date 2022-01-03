<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('/') }}">Главная</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('site-panel/gallary-list') }}/<?php echo config('constants.Stories');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>"">Рассказы</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('site-panel/gallary-list') }}/<?php echo config('constants.Gallary');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>">Галереи<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('site-panel/gallary-list') }}/<?php echo config('constants.Comix');?>/<?php echo config('constants.Russian');?>/<?php echo config('constants.All');?>"">Комиксы</a>
            </li>
            
        </ul>
        @if(Session::has('login'))                                        
            <p style="color:#ffffff">
                {{ Session::get('login') }} 
                &nbsp;
                <form class="form-inline my-2 my-lg-0" action="{{ url('logout') }}" metho="POST">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Выйти</button>
                </form>
            </p>
        @else
            <!--Перенаправление-->
            <p style="color:#ffffff">
                &nbsp;
                <form class="form-inline my-2 my-lg-0" action="{{ url('/admin') }}" metho="GET">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Войти</button>
                </form>
            </p>
        @endif        
    </div>
</nav>