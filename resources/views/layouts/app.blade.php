<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('lib/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>

<body >
<nav class="navbar navbar-light bg-light">
    <div class="container-fluid"  >
        @include('inc.messages')
    </div>
</nav>

<main class="col-sm p-1 " >
    <div class="container-fluid row">
            <div class="col-2 p-1 bg-light ">
                @yield('content')
            </div>
            <div class="col-sm-10 bg-light">
                @yield('content2')
            </div>
    </div>

</main>
<div class="fixed-bottom bg-light">
    <a class="btn btn btn btn-secondary m-3" href="/repair/create" >Заявка</a>
    <a class="btn btn btn btn-secondary m-3" href="/repair" >Ремонт</a>
    <a class="btn btn btn btn-secondary m-3" href="/" >Машины</a>
    <a class="btn btn btn btn-secondary m-3" href="/client" >Клиенты</a>
    <button class="btn btn-outline-secondary m-3" data-bs-toggle="dropdown" style="width:110px">найти</button>
    <ul class="dropdown-menu" style="width:195px">
        <li><a class="dropdown-item" id="startArr">исходный массива </a></li>
        <li><a class="dropdown-item" id="sortCity">по пунктам назначения</a></li>
        <li><a class="dropdown-item" id="sortPrice">по стоимости</a></li>
        <li><a class="dropdown-item" id="sortNumber">по номеру рейса</a></li>
    </ul>
    <button class="btn btn-outline-secondary m-3" data-bs-toggle="dropdown" style="width:110px">выделить</button>
    <ul class="dropdown-menu" style="width:250px">
        <li><a class="dropdown-item" id="selectPrice">со стоимостью выше значения</a></li>
        <li><a class="dropdown-item" id="selectCity">по пункту назначения</a></li>
        <li><a class="dropdown-item" id="selectNumber">по номеру рейса</a></li>
    </ul>
</div>
</body>

</html>
