@extends("layout.default")

@section("content")
<form method="POST" action="{{ route('task.store') }}">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок:</label>
        <input type="text" name="title" id="title" class="form-control">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Описание:</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Создать</button>
</form>
@endsection