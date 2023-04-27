@extends("layout.default")

@section("content")
    <form method="POST" action="{{ route('user.update', $employee->id) }}">
        @csrf
        @method('PUT')

        <div class="mt-3 form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employee->name) }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        {{-- <div class="mt-3 form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee->email) }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div> --}}

        @if ($user->role == 'boss' || ($user->role == 'employee' && !$employee->vacation_set))
        <div class="mt-3 form-group row">
            <label for="start_date" class="col-md-4 col-form-label text-md-right">Дата начала отпуска</label>

            <div class="col-md-6">
                <input id="start_date" type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date', $employee->start_date) }}" required>

                @error('start_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mt-3 form-group row">
            <label for="end_date" class="col-md-4 col-form-label text-md-right">Дата конца отпуска</label>

            <div class="col-md-6">
                <input id="end_date" type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date', $employee->end_date) }}">

                @error('end_date')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @endif

        @if ($user->role == 'boss')
        <div class="mt-3 form-group row">
            <label for="vacation_set" class="col-md-4 col-form-label text-md-right">Блокировать изменения</label>

            <div class="col-md-6">
                <div>
                    <label>Да <input id="vacation_set_yes" type="radio" class="form-check-input @error('vacation_set') is-invalid @enderror" name="vacation_set" value="1" {{ old('vacation_set', $employee->vacation_set) ? 'checked' : '' }}></label>
                    <label>Нет <input id="vacation_set_no" type="radio" class="form-check-input @error('vacation_set') is-invalid @enderror" name="vacation_set" value="0" {{ old('vacation_set', !$employee->vacation_set) ? 'checked' : '' }}></label>
                </div>

                @error('vacation_set')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="mt-3 form-group row">
            <label for="role" class="col-md-4 col-form-label text-md-right">Роль</label>

            <div class="col-md-6">
                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" required>
                    <option value="">--</option>
                    <option value="employee" {{ old('role', $employee->role) == 'employee' ? 'selected' : '' }}>Сотрудник</option>
                    <option value="boss" {{ old('role', $employee->role) == 'boss' ? 'selected' : '' }}>Начальник</option>
                </select>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        @endif

        <div class="mt-3 form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Обновить
                </button>
                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                    Назад
                </a>
            </div>
        </div>
    </form>
@endsection