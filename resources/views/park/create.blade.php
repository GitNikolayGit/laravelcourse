@extends('layouts.app')

@section('title')
    Добавить
@endsection

@section('content')


@endsection

@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-sm-7 p-1 bg-light ">
            <!-- добавить запчасть -->
            <h6>Добавить запчасть</h6>
            <form class="p3 bg-light text-center w-100" action="/park/create" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="model">Модель</label>
                    <select required class="form-control" id="model" name="model">
                        <option></option>
                        @foreach(\App\Models\Modelcar::with('brand')->get() as $dir)
                            <option value="{{$dir->id}}">{{$dir->brand->title. ' '.$dir->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label for="defect">Категория</label>
                    <select required class="form-control" id="defect" name="defect">
                        <option></option>
                        @foreach(\App\Models\Defect::all() as $dir)
                            <option value="{{$dir->id}}">{{$dir->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-1">
                    <label for="title">Наименование</label>
                    <input required type="text" placeholder="название детали" class="form-control" id="title" name="title"
                           value="{{old('title')}}">
                </div>
                <div class="mb-1">
                    <label for="price">Цена</label>
                    <input required type="text" placeholder="цена" class="form-control" id="price" name="price"
                                                      value="{{old('price')}}">
                </div>
                <div class="mb-1">
                    <label for="photo">фото</label>
                    <p><input type="file" class="form-control" name="photo" id="photo"></p>
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-success">Добавить</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>
        </div>

        <div class="col-sm-5 bg-light">

        </div>
    </div>
@endsection
