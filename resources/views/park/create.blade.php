@extends('layouts.app')

@section('title')
    заявка
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
                    <label for="title">Наименование</label>
                    <input type="text" placeholder="название детали" class="form-control" id="title" name="title"
                           value="{{old('title')}}">
                </div>
                <div class="mb-1">
                    <label for="price">Цена</label>
                    <input type="text" placeholder="цена" class="form-control" id="price" name="price"
                                                      value="{{old('price')}}">
                </div>
                <div class="mb-1">
                    <label for="photo-client">фото</label>
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
