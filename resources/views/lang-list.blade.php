                <h4>Типы контента</h4>
                <form class="form-inline my-2 my-lg-0" action="{{ url('admin-panel/create-lang') }}" method="GET">
                <button class="btn btn-success" type="submit">Создать Язык</button>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Язык</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['lang'] as $lang)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $lang->name }}</td> 
                            <td>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <form action="{{ url('admin-panel/change-lang/'.$lang->id.'/'.$lang->name.'') }}" method="GET">
                                            {{ csrf_field() }}
                                            <input class="btn btn-success" value="Изменить" type="submit">
                                        </form>  
                                    </div>
                                    <div class="col-sm-6">
                                        <form action="{{ url('deletelang') }}" method="POST">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{ $lang->id }}" name="langid">
                                            <input class="btn btn-secondary" value="Удалить" type="submit">
                                        </form>  
                                    </div> 
                                </div>                           
                            </td>
                        @endforeach
                    </tbody>
                </table>