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
                        <form class="p3 bg-light text-center w-100" action="/car/add_brand" method="post" enctype="multipart/form-data">
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
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <!-- добавить клиента -->
            <form class="p3 bg-light text-center w-100" action="/client/create" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
                </div>
                <div class="mb-1">
                    <label for="firstName">Имя</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{old('firstName')}}">
                </div>
                <div class="mb-1">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic"
                           value="{{old('patronymic')}}">
                </div>
                <div class="mb-1">
                    <label for="passport">Паспорт</label>
                    <input type="text" class="form-control" id="passport" name="passport" value="{{old('passport')}}">
                </div>
                <div class="mb-1">
                    <label for="birhday">Дата рождения</label>
                    <input type="text" readonly class="form-control" id="birhday" name="birhday"
                           value="{{old('birhday')}}">
                </div>
                <div class="mb-1">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="{{old('address')}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-danger">Добавить</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>

        </div>
        <!-- добавить машину -->
        <div class="col-sm-5 bg-light">
            <form class="p3 bg-light text-center w-100" action="/car/create" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="surname"><h6>Владелец</h6></label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control" id="firstName" name="firstName" value="{{'firstName'}}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control" id="patronymic" name="patronymic" value="{{'patronymic'}}">
                </div>
                <div class="mb-1">
                    <label for="date"><h6>Машина</h6></label>
                    <input type="text" readonly class="form-control" id="date" name="date" value="{{'date'}}">
                </div>
                <div class="mb-1">
                    <input type="text" class="form-control" id="num" name="num" value="{{'num'}}">
                </div>
                <div class="mb-1">
                    <input type="text" readonly class="form-control" id="brand" name="brand" value="{{'brand'}}">
                </div>
                <div class="mb-1">
                    <input type="text" readonly class="form-control" id="modelcar" name="modelcar" value="{{'modelcar'}}">
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
                    <label for="defect"><h6>Неисправность</h6></label>
                    <select class="form-control" id="defect" name="defect">
                        <option value="{{$car->id}}">{{$car->defect->title}}</option>
                        @foreach(\App\Models\Defect::all() as $dir)
                            <option value="{{$dir->id}}">{{$dir->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-danger">Изменить</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>
        </div>
    </div>
@endsection
