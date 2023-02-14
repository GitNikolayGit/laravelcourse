@extends('layouts.app')

@section('title')
    Ремонт
@endsection

@section('content')
    <p></p>
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/application/create">добавить заявку</a>
@endsection

@section('content2')
    <table class="table table-striped caption-top">
        <caption>заявки</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>Фото</th>
            <th>Модель</th>
            <th>Номер</th>
            <th>Неисправность</th>
            <th>Фото</th>
            <th>Клиент</th>
            <th>Паспорт</th>
            <th>Дата приема</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $appl)
            <tr>
                <td>{{$appl->id}}</td>
                <td><img style="height: 80px" src="{{asset(file_exists("storage/images/avto/".$appl->car->modelcar->brand_id.$appl->car->modelcar_id.".jpg")
                  ? "storage/images/avto/".$appl->car->modelcar->brand_id.$appl->car->modelcar_id.".jpg" : "storage/images/avto/noo.jpg")}}" alt="фото машины"></td>
                <td>{{$appl->car->modelcar->brand->title. ' '. $appl->car->modelcar->title}}</td>
                <td>{{$appl->car->num}}</td>
                <td>{{$appl->car->defect->title}}</td>
                <td><img style="height: 80px" src="{{asset(file_exists("storage/images/person/".$appl->client_id.".jpg")
                  ? "storage/images/person/".$appl->client_id.".jpg" : "storage/images/person/noo.jpg")}}" alt="фото клиента"></td>
                <td>{{$appl->client->surname. ' '.$appl->client->firstName. ' '.$appl->client->patronymic}}</td>
                <td>{{$appl->client->passport}}</td>
                <td>{{$appl->date_start}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success" href="/client/edit/{{$appl->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
                <td class="text-center">
                    <a class="btn btn-success" href="/repair/create/{{$appl->id}}" title="Ремонт добавить">
                        ремонт
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
