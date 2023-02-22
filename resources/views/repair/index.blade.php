@extends('layouts.app')

@section('title')
    Ремонт
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
                        <div  >
                            <a class="btn btn btn btn-outline-success w-100  " href="/repair">текущие</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div  >
                            <a class="btn btn btn btn-outline-success w-100  " href="/repair/select_all">все</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/repair/select_num" method="post">
                            @csrf

                            <div class="mb-1">
                                <label for="appl">Номер заявки</label>
                                <input type="number" id="appl" name="appl" class="form-control"/>
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
        <caption>ремонт</caption>
        <thead>
        <tr>
            <th>Заявка</th>
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

        @foreach($repairs->sortByDesc('id') as $repair)
            <tr>
                <td>{{$repair->application->id}}</td>
                <td>{{$repair->application->car->defect->title}}</td>

                <td>{{$repair->application->car->modelcar->brand->title. ' '.$repair->application->car->modelcar->title}}</td>
                <td>{{$repair->application->car->num}}</td>
                <td>{{$repair->worker->surname. ' '.$repair->worker->firstName. ' '.$repair->worker->patronymic}}</td>
                <td>{{$repair->application->client->surname. ' '.$repair->application->client->firstName. ' '.$repair->application->client->patronymic}}</td>
                <td>{{$repair->park->title}}</td>
                <td>{{$repair->service->title}}</td>
                <td>{{$repair->service->time}}</td>
                <td class="text-center">
                    <a class="btn btn-success <?php if($repair->deleted_at <> null) echo "disabled"; ?>"  href="/repair/create/{{$repair->application->id}}" title="Добавить ремонт...">

                        <i class="bi bi-plus-circle"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
