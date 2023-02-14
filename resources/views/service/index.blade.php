@extends('layouts.app')

@section('title')
    Услуги
@endsection

@section('content')
    <p></p>
    <div class=" m-1 p-1">
        <div id="accordion">
            <!-- добавление цвета -->
            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                        Выборка
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">

                            <div class="mt-3">
                                <a class="btn btn btn btn-outline-success w-100 m-1" href="/service">все запчасти</a>
                            </div>
                    </div>

                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/service/sort" method="post">
                            @csrf
                            <div class="mb-1">
                                <label for="defect">По категориям</label>
                                <select required class="form-control" id="defect" name="defect">
                                    <option></option>
                                    @foreach(\App\Models\Defect::all() as $dir)
                                        <option value="{{$dir->id}}">{{$dir->title}}</option>
                                    @endforeach
                                </select>
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
    <div class="col-sm p-1 row">
        <div class="col-sm-7 p-1 bg-light ">
            <table  class="table table-striped caption-top">
                <caption>запчасти</caption>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Наименование</th>
                        <th>Время</th>
                        <th>Стоимость</th>
                        <th>Категория</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{$service->id}}</td>
                        <td>{{$service->title}}</td>
                        <td>{{$service->time}}</td>
                        <td>{{$service->price}}</td>
                        <td>{{$service->defect->title}}</td>
                        <td class="text-center">
                            <a class="btn btn-outline-success" href="/park/edit/{{$service->id}}" title="Изменить...">
                                <i class="bi bi-pencil"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-sm-5 p-1 bg-light ">
            <p></p>
            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                        Добавить запчасть
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/service/create" method="post"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <label for="title">название</label>
                                <input type="text" placeholder="название" class="form-control" id="title" name="title"
                                       value="{{old('title')}}">
                            </div>
                            <div class="mb-1">
                                <label for="time">время</label>
                                <input type="text" placeholder="время на работу 0.00" class="form-control" id="time" name="time"
                                                                 value="{{old('time')}}">
                            </div>
                            <div class="mb-1">
                                <label for="price">цена</label><input type="text" placeholder="цена" class="form-control" id="price" name="price"
                                                                  value="{{old('price')}}">
                            </div>
                            <div class="mb-1">
                                <label for="defect">категория</label>
                                <select required class="form-control" id="defect" name="defect">
                                    <option></option>
                                    @foreach(\App\Models\Defect::all() as $dir)
                                        <option value="{{$dir->id}}">{{$dir->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success">Добавить</button>
                                <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
