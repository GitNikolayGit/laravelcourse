@extends('layouts.app')

@section('title')
    редактирование
@endsection

@section('content')

@endsection

@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <!-- изменить услугу  -->
            <form class="p3 bg-light text-center w-100" action="/service/edit/{{$service->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="title"><h6>Название</h6></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{$service->title}}">
                </div>
                <div class="mb-1">
                    <label for="time">Время</label>
                    <input type="time" class="form-control" id="time" name="time" value="{{$service->time}}">
                </div>
                <div class="mb-1">
                    <label for="price">Цена</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{$service->price}}">
                </div>
                <div class="mb-1">
                    <label for="defect">категория</label>
                    <select required class="form-control" id="defect" name="defect">
                        <option value="{{$service->defect->id}}">{{$service->defect->title}}</option>
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
