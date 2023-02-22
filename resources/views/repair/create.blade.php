@extends('layouts.app')

@section('title')
    ремонт
@endsection

@section('content')
    <div id="accordion">
        <!-- добавление ремонта -->
        <div class="card">
            <div class="card-header">
                <a class="btn w-100" data-bs-toggle="collapse" href="#collapseRepair">
                    <h6>Добавить ремонт</h6>
                </a>
            </div>
            <div id="collapseRepair" class="collapse show" data-bs-parent="#accordion">
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
                            <button type="submit" class="btn btn-outline-success w-100">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- справки -->
        <div class="card">
            <div class="card-header">
                <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseReseption">
                    <h6>Справки</h6>
                </a>
            </div>
            <div id="collapseReseption" class="collapse" data-bs-parent="#accordion">
                <div class="card-body">
                    <form class="p3 bg-light text-center w-100" action="/repair/reception/{{$applications->id}}" method="post">
                        @csrf
                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-success w-100" >Прием</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <form class="p3 bg-light text-center w-100" action="/repair/reception_return/{{$applications->id}}" method="post">
                        @csrf
                        <div class="mt-3">
                            <button type="submit" class="btn btn-outline-success w-100">Выдача</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
                    <td>год выпуска: <b>{{$applications->car->date}}</b></td>
                    <td>номер: <b>{{$applications->car->num}}</b></td>
                    <td>модель: <b>{{$applications->car->modelcar->brand->title. ' '.$applications->car->modelcar->title}}</b></td>

                    <td>неисправность: <b>{{$applications->car->defect->title}}</b></td>

                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <h6>Ремонт</h6>
    <table style="height: 350px">
    @foreach(\App\Models\Repair::all()->where('application_id', $applications->id) as $rep)
            <tr>
                <td>Работник: <b>{{$rep->worker->surname.' '.$rep->worker->firtName.' '.$rep->worker->patronymic}}</b></td>
            </tr>
            <tr>
                <td>Специальность: <b>{{$rep->worker->profession->title}}</b></td>
            </tr>
            <tr>
                <td>Услуга: <b>{{$rep->service->title}}</b> цена: <b>{{$rep->service->price}}</b></td>
            </tr>
            <tr>
                <td>Время: <b>{{$rep->service->time}}</b></td>
            </tr>
            <tr>
                @if ($rep->park_id != null)
                <td>Запчасть: <b>{{$rep->park->title}}</b> цена: <b>{{$rep->park->price}}</b><hr></td>
                @endif
            </tr>

    @endforeach
    </table>

@endsection

