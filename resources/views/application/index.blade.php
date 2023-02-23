@extends('layouts.app')

@section('title')
    Ремонт
@endsection

@section('content')
    <p></p>
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/application/create">добавить заявку</a>
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/application/select_actual">текущие заявки</a>
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/application/select_all">архив заявки</a>
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
        </tr>
        </thead>
        <tbody>
        @foreach($applications->sortByDesc('id') as $appl)


            <tr>
                <td>{{$appl[0]->application->id}}</td>
                <td><img style="height: 80px" src="{{asset(file_exists("storage/images/avto/".$appl[0]->application->car->modelcar->brand_id.$appl[0]->application->car->modelcar_id.".jpg")
                  ? "storage/images/avto/".$appl[0]->application->car->modelcar->brand_id.$appl[0]->application->car->modelcar_id.".jpg" : "storage/images/avto/noo.jpg")}}" alt="фото машины"></td>
                <td>{{$appl[0]->application->car->modelcar->brand->title.' '.$appl[0]->application->car->modelcar->title}}</td>
                <td>{{$appl[0]->application->car->num}}</td>
                <td>{{$appl[0]->application->car->defect->title}}</td>
                <td><img style="height: 80px" src="{{asset(file_exists("storage/images/person/".$appl[0]->application->client_id.".jpg")
                  ? "storage/images/person/".$appl[0]->application->client_id.".jpg" : "storage/images/person/noo.jpg")}}" alt="фото клиента"></td>
                <td>{{$appl[0]->application->client->surname. ' '.$appl[0]->application->client->firstName. ' '.$appl[0]->application->client->patronymic}}</td>
                <td>{{$appl[0]->application->client->passport}}</td>
                <td>{{$appl[0]->application->date_start}}</td>

                <td class="text-center">
                    <a class="btn btn-outline-success <?php if($appl[0]->deleted_at <> null) echo "disabled"; ?>"  href="/repair/create/{{$appl[0]->application->id}}" title="Ремонт добавить">
                        ремонт
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
