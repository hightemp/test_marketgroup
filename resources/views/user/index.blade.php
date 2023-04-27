@extends("layout.default")

@section("content")

<table class="table">
    <thead>
        <tr>
            <th>ФИО</th>
            <th>email</th>
            <th>Роль</th>
            <th>Признак</th>
            <th>Дата начала</th>
            <th>Дата конца</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->role }}</td>
                <td>{{ $employee->vacation_set }}</td>
                <td>{{ $employee->start_date }}</td>
                <td>{{ $employee->end_date }}</td>
                <td class="table-actions-col">
                    @auth
                    
                    <div class="table-actions-col-inner">
                        <a href="{{ route('user.show', $employee->id) }}" class="btn btn-sm btn-primary">Просмотреть</a>
                        @if ($user->role == 'boss' || $user->id == $employee->id)
                        <a href="{{ route('user.edit', $employee->id) }}" class="btn btn-sm btn-secondary">Редактировать</a>
                        @endif
                    </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}

@endsection