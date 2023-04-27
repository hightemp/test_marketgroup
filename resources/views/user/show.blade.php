@extends("layout.default")

@section("content")
<h1>{{ $employee->name }}</h1>
<p>{{ $employee->email }}</p>
<p>{{ $employee->role }}</p>
<p>{{ $employee->vacation_set }}</p>
<p>{{ $employee->start_date }}</p>
<p>{{ $employee->end_date }}</p>
@endsection