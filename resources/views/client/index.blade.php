@extends('layouts.app')

@section('title')
    Клиенты
@endsection

@section('content')
    <div class=" m-1 p-1">
        <div id="accordion">

            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOn">
                        Поиск
                    </a>
                </div>
                <div id="collapseOn" class="collapse show" data-bs-parent="#accordion">

                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/client/find_passport" method="post">
                            @csrf

                            <div class="mb-1">
                                <label for="passport">По паспорту</label>
                                <input type="text" id="passport" name="passport" class="form-control"/>
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success w-100">Выбрать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                <td><img style="height: 80px" src="{{asset(file_exists("storage/images/person/".$client->id.".jpg")
                  ? "storage/images/person/".$client->id.".jpg" : "storage/images/person/noo.jpg")}}" alt="фото клиента"></td>
                <td>{{$client->surname}}</td>
                <td>{{$client->firstName}}</td>
                <td>{{$client->patronymic}}</td>
                <td>{{$client->passport}}</td>
                <td>{{$client->birhday}}</td>
                <td>{{$client->address}}</td>
                <td class="text-center">
                    <a class="btn btn-success" href="/client/edit/{{$client->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
