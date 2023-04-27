@extends("layout.default")

@section("content")
<form action="{{ route('task.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Заголовок</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
    </div>
    <button type="submit" class="mt-3 btn btn-primary">Обновить</button>
</form>
@endsection