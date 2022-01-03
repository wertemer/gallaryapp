<h4>Типы контента</h4>
<form class="form-inline my-2 my-lg-0" action="{{ url('admin-panel/create-genre') }}" method="GET">
    <button class="btn btn-success" type="submit">Создать Жанр</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Жанры</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['genre'] as $genre)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $genre->name }}</td> 
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ url('admin-panel/change-genre/'.$genre->id.'/'.$genre->name.'') }}" method="GET">
                            {{ csrf_field() }}
                            <input class="btn btn-success" value="Изменить" type="submit">
                        </form>  
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ url('deletegenre') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $genre->id }}" name="genreid">
                            <input class="btn btn-secondary" value="Удалить" type="submit">
                        </form>  
                    </div> 
                </div>                           
            </td>
        </tr>
        @endforeach
    </tbody>
</table> 
{{ $data['genre']->links() }}
