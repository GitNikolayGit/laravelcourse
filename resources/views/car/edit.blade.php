@extends('layouts.app')

@section('title')
    редактирование
@endsection

@section('content')
    <p></p>
    <div class=" m-1 p-1">
        <div id="accordion">
            <!-- добавление цвета -->
            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                        Добавить цвет
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/car/add_color" method="post">
                            @csrf
                            <div class="mb-1">
                                <input type="text" class="form-control" id="color" name="color" placeholder="цвет">
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- добавление марки машины -->
            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseTwo">
                        Добавить марку
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/car/addcolor/{{$car->id}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="марка">
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-outline-success">Добавить</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- добавление модели -->
            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseThree">
                        Добавить модель
                    </a>
                </div>
                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                    <div class="card-body">
                        <form class="p3 bg-light text-center w-100" action="/car/addcolor/{{$car->id}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-1">
                                <select class="form-control" id="color" name="color">
                                    <option>марка</option>
                                    @foreach(\App\Models\Brand::all() as $dir)
                                        <option value="{{$dir->id}}">{{$dir->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-1">
                                <input type="text" class="form-control" id="surname" name="surname" placeholder="модель">
                            </div>
                            <div class="mb-1">
                                <p>фото</p>
                                <p><input type="file" class="form-control" name="photo-car" id="photo-car"></p>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-outline-success">Добавить</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('content2')
    <!-- изменить машину -->
    <form class="p3 bg-light text-center w-50" action="/car/edit/{{$car->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-1">
            <label for="surname">Владелец</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{$car->surname}}">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control" id="firstName" name="firstName" value="{{$car->firstName}}">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{$car->patronymic}}">
        </div>
        <div class="mb-1">
            <label for="date">Машина</label>
            <input type="text" readonly class="form-control" id="date" name="date" value="{{$car->date}}">
        </div>
        <div class="mb-1">
            <input type="text" class="form-control" id="num" name="num" value="{{$car->num}}">
        </div>
        <div class="mb-1">
            <input type="text" readonly class="form-control" id="brand" name="brand" value="{{$car->modelcar->brand->title}}">
        </div>
        <div class="mb-1">
            <input type="text" readonly class="form-control" id="modelcar" name="modelcar" value="{{$car->modelcar->title}}">
        </div>
        <div class="mb-1">
            <select class="form-control" id="color" name="color">
                <option value="{{$car->id}}">{{$car->color->title}}</option>
                @foreach(\App\Models\Color::all() as $dir)
                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-1">
            <label for="defect">Неисправность</label>
            <select class="form-control" id="defect" name="defect">
                <option value="{{$car->id}}">{{$car->defect->title}}</option>
                @foreach(\App\Models\Defect::all() as $dir)
                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-outline-danger">Изменить</button>
        </div>
    </form>
@endsection


