@extends('layouts.app')

@section('title')
    Ремонт
@endsection

@section('content')

@endsection

@section('content2')
    <table class="table table-striped caption-top">
        <caption>ремонт</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>Неисправность</th>
            <th>Модель</th>
            <th>Номер</th>
            <th>Работник</th>
            <th>Клиент</th>
            <th>Запчасть</th>
            <th>Сервис</th>
            <th>Время работы</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($repairs as $repair)
            <tr>
                <td>{{$repair->id}}</td>
                <td>{{$repair->application->car->defect->title}}</td>

                <td>{{$repair->application->car->modelcar->brand->title. ' '.$repair->application->car->modelcar->title}}</td>
                <td>{{$repair->application->car->num}}</td>
                <td>{{$repair->worker->surname. ' '.$repair->worker->firstName. ' '.$repair->worker->patronymic}}</td>
                <td>{{$repair->application->client->surname. ' '.$repair->application->client->firstName. ' '.$repair->application->client->patronymic}}</td>
                <td>{{$repair->park->title}}</td>
                <td>{{$repair->service->title}}</td>
                <td>{{$repair->service->time}}</td>
                <td class="text-center">
                    <a class="btn btn-success" href="/client/edit/{{$repair->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
