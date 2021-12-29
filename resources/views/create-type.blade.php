                <h4>Cоздание типа контента</h4>
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
                <form class="form" action="{{ url('createtypes') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="type-name">Введите тип контента</label>
                    <input type="text" class="form-control" name="typename">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Ok</button>
                </form>