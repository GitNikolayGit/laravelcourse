@extends('layouts.app')

@section('title')
    Машины
@endsection

@section('content')

@endsection
'service_id',        // оказанная услуга
'car_id',
'worker_id',
'client_id',
'park_id',
//'datestart' ,      // поставка на ремонт
'datereturn',
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
            <th>Дата возврата</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($repairs as $repair)
            <tr>
                <td>{{$repair->id}}</td>
                <td>{{$repair->car->defect->title}}</td>

                <td>{{$repair->car->modelcar->brand->title. ' '.$repair->car->modelcar->title}}</td>
                <td>{{$repair->car->num}}</td>
                <td>{{$repair->worker->surname. ' '.$repair->worker->firstName. ' '.$repair->worker->patronymic}}</td>
                <td>{{$repair->client->surname. ' '.$repair->client->firstName. ' '.$repair->client->patronymic}}</td>
                <td>{{$repair->park->title}}</td>
                <td></td>
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
