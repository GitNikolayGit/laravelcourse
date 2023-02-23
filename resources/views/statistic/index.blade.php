@extends('layouts.app')

@section('title')
    Статистика
@endsection

@section('content')
        <div class="col-sm">
            <div id="accordion2">
                <div class="card">
                    <div class="card-header">
                        <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                            <h6>Количество рабочих</h6>
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion2">
                        <div class="card-body">
                            <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/statistic/query7">Показать</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseTwo">
                            <h6>Справки</h6>
                        </a>
                    </div>
                    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion2">
                        <div class="card-body">
                            количество автомобилей в ремонте
                            <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/statistic/query_count_car">Выдать</a>
                        </div>

                        <div class="card-body">
                            количество незанятых рабочих на текущий момент
                            <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/statistic/query9">Выдать</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseThree">
                            <h6>Месячный отчет</h6>
                        </a>
                    </div>
                    <div id="collapseThree" class="collapse" data-bs-parent="#accordion2">
                        <div class="card-body">
                            <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/statistic/query10">Выдать</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('content2')
    <div class="row ">
        <div class="col-sm-7">
            <div id="accordion">
                <div class="card">
                    <div class="card-header">
                        <a class="btn w-100" data-bs-toggle="collapse" href="#collapse1">
                            <h6>Фамилия, имя, отчество и адрес владельца автомобиля с данным номером государственной регистрации</h6>
                        </a>
                    </div>
                    <div id="collapse1" class="collapse show" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/statistic/query" method="post">
                                @csrf


                                <div class="mb-1">
                                    <label for="num">Номер машины</label>
                                    <select class="form-control" id="num" name="num">
                                        <option></option>
                                        @foreach(\App\Models\Repair::all()->groupBy('application_id') as $dir)
                                            <option value="{{$dir[0]->application->car->id}}">{{$dir[0]->application->car->num}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header ">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapse2">
                            <h6>Марка и год выпуска автомобиля данного владельца</h6>
                        </a>
                    </div>
                    <div id="collapse2" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/repair/query2" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label for="client">Владелец</label>
                                    <select class="form-control" id="client" name="client">
                                        <option></option>
                                        @foreach(\App\Models\Repair::all()->groupBy('application_id') as $dir)
                                            <option value="{{$dir[0]->application->client->id}}">
                                                {{$dir[0]->application->client->surname.' '.$dir[0]->application->client->firstName.' '.$dir[0]->application->client->patronymic}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapse3">
                            <h6>Перечень устраненных неисправностей в автомобиле данного владельца</h6>
                        </a>
                    </div>
                    <div id="collapse3" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/repair/query3" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label for="client">Владелец</label>
                                    <select class="form-control" id="client" name="client">
                                        <option></option>
                                        @foreach(\App\Models\Repair::all()->groupBy('application_id') as $dir)
                                            <option value="{{$dir[0]->application->client->id}}">
                                                {{$dir[0]->application->client->surname.' '.$dir[0]->application->client->firstName.' '.$dir[0]->application->client->patronymic}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapse4">
                            <h6>Фамилия, имя, отчество работника станции, устранявшего данную неисправность в автомобиле данного клиента, и время ее устранения</h6>
                        </a>
                    </div>
                    <div id="collapse4" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/repair/query4" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label for="client">Владелец</label>
                                    <select class="form-control" id="client" name="client">
                                        <option></option>
                                        @foreach(\App\Models\Repair::all()->groupBy('application_id') as $dir)
                                            <option value="{{$dir[0]->application->client->id}}">
                                                {{$dir[0]->application->client->surname.' '.$dir[0]->application->client->firstName.' '.$dir[0]->application->client->patronymic}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapse5">
                            <h6>Фамилия, имя, отчество клиентов, сдавших в ремонт автомобили с указанным типом неисправности</h6>
                        </a>
                    </div>
                    <div id="collapse5" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/repair/query5" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label for="defect">Неисправность</label>
                                    <select class="form-control" id="defect" name="defect">
                                        <option></option>
                                        @foreach(\App\Models\Defect::all() as $dir)
                                            <option value="{{$dir->id}}">
                                                {{$dir->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapse6">
                            <h6>Самая распространенная неисправность в автомобилях указанной марки</h6>
                        </a>
                    </div>
                    <div id="collapse6" class="collapse" data-bs-parent="#accordion">
                        <div class="card-body">
                            <form class="p3 bg-light text-center w-100" action="/repair/query6" method="post">
                                @csrf
                                <div class="mb-1">
                                    <label for="brand">Марка</label>
                                    <select class="form-control" id="brand" name="brand">
                                        <option></option>
                                        @foreach(\App\Models\Brand::all() as $dir)
                                            <option value="{{$dir->id}}">
                                                {{$dir->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success w-100">Найти</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-5">
            <h6>Информация</h6>
            <p></p>
            <table>
            @foreach($info as $key => $item)
                <tr>
                    <td>{{$key}}</td>
                    <td> {{$item}}</td>
                </tr>
            @endforeach
            </table>

        </div>
    </div>


@endsection
