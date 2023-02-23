<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('lib/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>

<body>
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        @include('inc.messages')
    </div>
</nav>

<main class="col-sm p-1 ">
    <div class="container-fluid row">
        <div class="col-sm-2 p-1 bg-light ">
            @yield('content')
        </div>
        <div class="col-sm-10 bg-light">
            @yield('content2')
        </div>
    </div>

</main>
<div class="fixed-bottom bg-light">
    <a class="btn btn btn btn-secondary m-3" href="/application">Заявка</a>
    <a class="btn btn btn btn-secondary m-3" href="/repair">Ремонт</a>
    <a class="btn btn btn btn-secondary m-3" href="/">Машины</a>
    <a class="btn btn btn btn-secondary m-3" href="/client">Клиенты</a>
    <a class="btn btn btn btn-secondary m-3" href="/worker">Работники</a>
    <a class="btn btn btn btn-secondary m-3" href="/park">Запчасти</a>
    <a class="btn btn btn btn-secondary m-3" href="/service">Сервис</a>
    <a class="btn btn btn btn-secondary m-3" href="/statistics">Статистика</a>
    <button class="btn btn-outline-secondary m-3" data-bs-toggle="dropdown" style="width:110px">Разработка</button>
    <ul class="dropdown-menu" style="width:195px">
        <li><a class="dropdown-item" href="/presentation">презентация</a></li>
    </ul>
</div>
</body>

</html>
