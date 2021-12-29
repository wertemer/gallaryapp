                <h4>Пользователи</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Логин</th>
                            <th scope="col">Электронная почта</th>
                            <th scope="col">Дата создания</th>
                            <th scope="col">Дата последнего изменения</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['users'] as $user)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>