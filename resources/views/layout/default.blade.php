<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <nav class="top-menu nav justify-content-center  ">
            <a class="nav-link" href="{{ route('home') }}" aria-current="page">Главная</a>
            <a class="nav-link" href="{{ route('user.index') }}">Сотрудники</a>
            <div style="flex:1"></div>
            @auth
                <span class="nav-link">{{ $user->name }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="nav-link nav-button" type="submit">Выйти</button>
            </form>
            @else
                <a class="nav-link" href="{{ route('login.form') }}">Войти</a>
            @endauth
        </nav>
        <div class="content">
            @yield("content")
        </div>
    </div>
</body>
</html>