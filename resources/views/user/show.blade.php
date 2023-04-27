@extends("layout.default")

@section("content")
<h1>{{ $employee->name }}</h1>
<p><b>email:</b> {{ $employee->email }}</p>
<p><b>Роль:</b> {{ $employee->role }}</p>
<p><b>Блокировать изменения:</b> {{ $employee->vacation_set }}</p>
<p><b>Дата начала отпуска:</b> {{ $employee->start_date }}</p>
<p><b>Дата конца отпуска:</b> {{ $employee->end_date }}</p>
@endsection