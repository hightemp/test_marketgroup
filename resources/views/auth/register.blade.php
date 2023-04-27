@extends("layout.default")

@section("content")
<div class="m-auto w-50">
<form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span>{{ $errors->first('email') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input class="form-control" type="password" id="password" name="password" required>
        @if ($errors->has('password'))
            <span>{{ $errors->first('password') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <label for="password_confirmation">Confirm Password:</label>
        <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required class="form-label">
        @if ($errors->has('password_confirmation'))
            <span>{{ $errors->first('password_confirmation') }}</span>
        @endif
    </div>

    <div class="mb-3">
        <button class="btn btn-primary" type="submit">Register</button>
    </div>
</form>
</div>
@endsection