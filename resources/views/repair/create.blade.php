@extends('layouts.app')

@section('title')
    ремонт
@endsection

@section('content')
    <div id="accordion">
        <div class="card">
            <div class="card-header">
                <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                    Добавить ремонт
                </a>
            </div>
            <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                <div class="card-body">
                    <form class="p3 bg-light text-center w-100" action="/repair/create/{{$applications->id}}" method="post">
                        @csrf
                        <!-- работник -->
                        <div class="mb-1">
                            <label for="worker">назначить работника</label>
                            <select required class="form-control" id="worker" name="worker">
                                <option></option>
                                @foreach(\App\Models\Worker::all()->where('profession_id', $applications->car->defect_id) as $dir)
                                    <option value="{{$dir->id}}">{{$dir->surname.' '. $dir->firstName.' '.$dir->patronymic}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- услуга -->
                        <div class="mb-1">
                            <label for="service">Сервис</label>
                            <select required class="form-control" id="service" name="service">
                                <option></option>
                                @foreach(\App\Models\Service::all()->where('defect_id', $applications->car->defect_id) as $dir)
                                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- запчасть -->
                        <div class="mb-1">
                            <label for="park">Запчасть</label>
                            <select class="form-control" id="park" name="park">
                                <option></option>
                                @foreach(\App\Models\Park::all()->where('defect_id', $applications->car->defect_id) as $dir)
                                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-success">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseT">
                        Справки
                    </a>
                </div>
                <div id="collapseT" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">

                        <form class="p3 bg-light text-center w-100" action="/repair/reception/{{$applications->id}}" method="post">
                            @csrf
                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success">О приеме</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- выдача справки -->

    </div>
@endsection

@section('content2')

    <div class="col-sm p-1 ">
        <h6>Номер заявки: {{$applications->id}}</h6>
        <table>
            <tbody>
                <tr>
                    <td><img style="height: 80px" src="{{asset(file_exists("storage/images/avto/".$applications->car->modelcar->brand_id.$applications->car->modelcar_id.".jpg")
                  ? "storage/images/avto/".$applications->car->modelcar->brand_id.$applications->car->modelcar_id.".jpg" : "storage/images/avto/noo.jpg")}}" alt="фото машины"></td>
                    <td><b>год выпуска:</b> {{$applications->car->date}}</td>
                    <td><b>номер:</b> {{$applications->car->num}}</td>
                    <td><b>модель:</b> {{$applications->car->modelcar->brand->title. ' '.$applications->car->modelcar->title}}</td>

                    <td><b>неисправность:</b> {{$applications->car->defect->title}}</td>
                    <td class="text-center">
                        <a class="btn btn-outline-success" href="/car/edit/{{$applications->car->id}}" title="Изменить...">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <h6>Ремонт</h6>
    <table style="height: 350px">
    @foreach(\App\Models\Repair::all()->where('application_id', $applications->id) as $rep)
            <tr>
                <td><b>Работник:</b> {{$rep->worker->surname.' '.$rep->worker->firtName.' '.$rep->worker->patronymic}}</td>
            </tr>
            <tr>
                <td><b>Специальность:</b> {{$rep->worker->profession->title}}</td>
            </tr>
            <tr>
                <td>Услуга: <b>{{$rep->service->title}}</b> <b>цена: {{$rep->service->price}}</b></td>
            </tr>
            <tr>
                @if ($rep->park_id != null)
                <td><b>Запчасть:</b> {{$rep->park->title}} <b>цена: {{$rep->park->price}}</b><hr></td>
                @endif
            </tr>

    @endforeach
    </table>

@endsection

