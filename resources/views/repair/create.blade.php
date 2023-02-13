@extends('layouts.app')

@section('title')
    заявка
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
                        <form class="p3 bg-light text-center w-100" action="/car/add_brand" method="post">
                            @csrf
                            <div class="mb-1">
                                <input type="text" class="form-control" id="brand" name="brand" placeholder="марка">
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
                        <form class="p3 bg-light text-center w-100" action="/car/add_model" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-1">
                                <select class="form-control" id="color" name="color">
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

@endsection
