                <h4>Изменить жанр с именем: {{ $data['name'] }}</h4>
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
                <form class="form" action="{{ url('changegenre') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="genre-name">Введите новое имя Жанра</label>
                    <input type="hidden" name="genreid" value="{{ $data['id'] }}">
                    <input type="text" class="form-control" name="newgenrename">
                    <button class="btn btn-success" type="submit">Ok</button>
                </form> 