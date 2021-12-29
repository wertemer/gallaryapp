<h4>Изменить типа контента с именем: {{ $data['name'] }}</h4>
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
                <form class="form" action="{{ url('changelang') }}" method="POST">
                    {{ csrf_field() }}
                    <label for="lang-name">Введите новое имя языка</label>
                    <input type="hidden" name="langid" value="{{ $data['id'] }}">
                    <input type="text" class="form-control" name="newlangname">
                    <button class="btn btn-success" type="submit">Ok</button>
                </form> 