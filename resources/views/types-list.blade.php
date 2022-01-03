<h4>Типы контента</h4>
<form class="form-inline my-2 my-lg-0" action="{{ url('admin-panel/create-type') }}" method="GET">
    <button class="btn btn-success" type="submit">Создать тип контента</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Тип</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($data['types'] as $type)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $type->name }}</td> 
            <td>
                <div class="row">
                    <div class="col-sm-6">
                        <form action="{{ url('admin-panel/change-type/'.$type->id.'/'.$type->name.'') }}" method="GET">
                            {{ csrf_field() }}
                            <input class="btn btn-success" value="Изменить" type="submit">
                        </form>  
                    </div>
                    <div class="col-sm-6">
                        <form action="{{ url('deletetypes') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ $type->id }}" name="typeid">
                            <input class="btn btn-secondary" value="Удалить" type="submit">
                        </form>  
                    </div> 
                </div>                           
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col-sm-12">
        {{ $data['types']->links() }}
    </div>
</div>