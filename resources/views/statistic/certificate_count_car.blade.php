<?php
use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width"/>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--<link rel="stylesheet" href="{{asset('css/style.css')}}">-->
    <link rel="stylesheet" href="{{asset('lib/bootstrap-icons/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</head>
<body>


<main class="col-sm p-1 ">
    <div class="container-fluid row">
        <div class="col-sm-2 p-1 bg-light ">

        </div>
        <div class="col-sm-10 bg-light">
            <h2>Автосервис</h2>
            <hr>
            <h6>Информация</h6>
            <hr>
            <p></p>
            <table class="table w-75" style="height: 380px">
            @foreach($info as $key => $item)
                <tr style="text-align: center">
                    <td><p>{{$key}}</p></td>
                    <td><p>{{$item}}</p> </td>
                </tr>
            @endforeach
            </table>
            <hr>
            <p>Дата выдачи : {{Carbon::now()->setTimezone('Europe/Moscow')}}</p>
            <a class="btn btn btn btn-outline-secondary m-1" onclick="window.print()">Печать</a>
            <a class="btn btn btn btn-outline-secondary m-1" href="#" onclick="history.back()">назад</a>
        </div>
    </div>
</main>
</body>
</html>
