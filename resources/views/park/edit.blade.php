@extends('layouts.app')

@section('title')
    редактирование
@endsection

@section('content')

@endsection

@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <!-- изменить запчасть -->
            <form class="p3 bg-light text-center w-100" action="/park/edit/{{$park->id}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="title">Модель</label>
                    <input type="text" readonly class="form-control" id="model" name="model"
                           value="{{$park->modelcar->brand->title.' '.$park->modelcar->title}}">
                </div>
                <div class="mb-1">
                    <label for="title">Категория</label>
                    <input type="text" readonly class="form-control" id="defect" name="defect" value="{{$park->defect->title}}">
                </div>
                <div class="mb-1">
                    <label for="title">Наименование</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$park->title}}">
                </div>
                <div class="mb-1">
                    <label for="price">Цена</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$park->price}}">
                </div>
                <div class="mb-1">
                    <label for="photo">Изменить фото</label>
                    <p><input type="file" class="form-control" name="photo" id="photo"></p>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-danger">Изменить</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>

        </div>
        <div class="col-sm-5 bg-light">
            <h6>Фото</h6>
            <img style="height: 350px" src="{{asset(file_exists("storage/images/park/".$park->id.".jpg")
                  ? "storage/images/park/".$park->id.".jpg" : "storage/images/park/noo.jpg")}}" alt="фото запчасти">
        </div>
    </div>
@endsection


