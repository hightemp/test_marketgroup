@extends("layout.default")

@section("content")
<div class="m-auto w-50">
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Пароль:</label>
        <input class="form-control" type="password" id="password" name="password" required>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Войти</button>
    </div>
</form>
</div>
@endsection