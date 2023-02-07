@extends('layouts.app')

@section('title')
    Машины
@endsection

@section('content')

@endsection

@section('content2')
    <table class="table table-striped caption-top">
        <caption>клиенты</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>Фото</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Паспорт</th>
            <th>Год рождения</th>
            <th>Адрес</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($clients as $client)
            <tr>
                <td>{{$client->id}}</td>
                <td><img style="height: 80px"
                         src="{{asset("storage/images/person/$client->id.jpg")}}"
                         alt="фото фильма">
                </td>
                <td>{{$client->surname}}</td>
                <td>{{$client->firstName}}</td>
                <td>{{$client->patronymic}}</td>
                <td>{{$client->passport}}</td>
                <td>{{$client->birhday}}</td>
                <td>{{$client->address}}</td>
                <td class="text-center">
                    <a class="btn btn-success" href="/car/edit/{{$client->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
