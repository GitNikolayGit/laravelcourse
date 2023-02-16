@extends('layouts.app')

@section('title')
    Заявка создание
@endsection

@section('content')

@endsection

@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-sm-7 p-1 bg-light ">
            <h6>Добавить заявку</h6>
            <form class="p3 bg-light text-center w-100 form" action="/application/create" method="post"
          enctype="multipart/form-data">
        @csrf
    <div class=" m-1 p-1">
        <div id="accordion2">
            <!-- добавление  -->
            <div class="card">
                <div class="card-header">
                    <a class="btn w-100" data-bs-toggle="collapse" href="#collapseOne">
                        Клиент
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion2">
                    <div class="card-body">
                        <div class="mb-1">
                            <label for="surname">клиент</label>
                            <input type="text" placeholder="фамилия" class="form-control" id="surname" name="surname"
                                   value="{{old('surname')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="имя" class="form-control" id="firstName" name="firstName"
                                   value="{{old('firstName')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="отчество" class="form-control" id="patronymic" name="patronymic"
                                   value="{{old('patronymic')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="паспорт" class="form-control" id="passport" name="passport"
                                   value="{{old('passport')}}">
                        </div>
                        <div class="mb-1">
                            <label for="birhday">дата рождения</label>
                            <input type="date" class="form-control" id="birhday" name="birhday" min="1950-01-01">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="адрес" class="form-control" id="address" name="address"
                                   value="{{old('address')}}">
                        </div>
                        <div class="mb-1">
                            <label for="photo-client">фото клиента</label>
                            <p><input type="file" class="form-control" name="photo-client" id="photo-client"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- добавление марки машины -->
            <div class="card">
                <div class="card-header">
                    <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseTwo">
                        Машина
                    </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion2">
                    <div class="card-body">
                        <div class="mb-1">
                            <input type="text" placeholder="владелец фамилия" class="form-control" id="surname-owner" name="surname-owner"
                                   value="{{old('surname-owner')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="владелец имя" class="form-control" id="firstName-owner" name="firstName-owner"
                                   value="{{old('firstName-owner')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="владелец отчество" class="form-control" id="patronymic-owner" name="patronymic-owner"
                                   value="{{old('patronymic-owner')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="год выпуска" class="form-control" id="date" name="date"
                                   value="{{old('date')}}">
                        </div>
                        <div class="mb-1">
                            <input type="text" placeholder="номер авто" class="form-control" id="num" name="num"
                                   value="{{old('num')}}">
                        </div>
                        <div class="mb-1">
                            <label for="model">Модель</label>
                            <select class="form-control" id="model" name="model">
                                <option></option>
                                @foreach(\App\Models\Modelcar::with('brand')->get() as $dir)
                                    <option value="{{$dir->id}}">{{$dir->brand->title. ' '.$dir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- цвет -->
                        <div class="mb-1">
                            <label for="color">Цвет</label>
                            <select class="form-control" id="color" name="color">
                                <option></option>
                                @foreach(\App\Models\Color::all() as $dir)
                                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1">
                            <label for="defect">Неисправность</label>
                            <select class="form-control" id="defect" name="defect">
                                <option></option>
                                @foreach(\App\Models\Defect::all() as $dir)
                                    <option value="{{$dir->id}}">{{$dir->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-outline-success">Добавить</button>
            </div>


        </div>
    </div>
    </form>
        </div>
        <div class="col-sm-5 p-1 bg-light ">
            <p></p>
            <div class=" m-1 p-1">
                <div id="accordion">
                    <!-- добавление цвета -->
                    <div class="card">
                        <div class="card-header">
                            <a class="btn w-100" data-bs-toggle="collapse" href="#collapseColor">
                                Добавить цвет
                            </a>
                        </div>
                        <div id="collapseColor" class="collapse show" data-bs-parent="#accordion">
                            <div class="card-body">
                                <form class="p3 bg-light text-center w-100" action="/car/add_color" method="post">
                                    @csrf
                                    <div class="mb-1">
                                        <input required type="text" class="form-control" id="color" name="color" placeholder="цвет">
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
                            <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseBrand">
                                Добавить марку
                            </a>
                        </div>
                        <div id="collapseBrand" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <form class="p3 bg-light text-center w-100" action="/car/add_brand" method="post">
                                    @csrf
                                    <div class="mb-1">
                                        <input required type="text" class="form-control" id="brand" name="brand" placeholder="марка">
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
                            <a class="collapsed btn w-100" data-bs-toggle="collapse" href="#collapseModel">
                                Добавить модель
                            </a>
                        </div>
                        <div id="collapseModel" class="collapse" data-bs-parent="#accordion">
                            <div class="card-body">
                                <form class="p3 bg-light text-center w-100" action="/car/add_model" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-1">
                                        <label for="brand">Марка</label>
                                        <select required class="form-control" id="brand" name="brand">
                                            <option></option>
                                            @foreach(\App\Models\Brand::all() as $dir)
                                                <option value="{{$dir->id}}">{{$dir->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-1">
                                        <label for="model">Модель</label>
                                        <input required type="text" class="form-control" id="model" name="model" placeholder="модель">
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



        </div>
    </div>



@endsection
