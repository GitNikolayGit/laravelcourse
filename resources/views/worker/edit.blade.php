@extends('layouts.app')

@section('title')
    редактирование
@endsection

@section('content')


@endsection


@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <!-- изменить работника -->
            <form class="p3 bg-light text-center w-100" action="/worker/edit/{{$worker->id}}" method="post">
                @csrf
                <div class="mb-1">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{$worker->surname}}">
                </div>
                <div class="mb-1">
                    <label for="firstName">Имя</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{$worker->firstName}}">
                </div>
                <div class="mb-1">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic"
                           value="{{$worker->patronymic}}">
                </div>
                <div class="mb-1">
                    <label for="category">Разряд</label>
                    <input type="text" class="form-control" id="category" name="category" value="{{$worker->category}}">
                </div>
                <div class="mb-1">
                    <label for="experience">Стаж</label>
                    <input type="text" class="form-control" id="experience" name="experience"
                           value="{{$worker->experience}}">
                </div>

                <div class="mb-1">
                    <label for="profession">Профессия</label>
                    <input type="text" readonly class="form-control" id="profession" name="profession"
                           value="{{$worker->profession->title}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-danger">Изменить</button>

                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>
        </div>
        <div class="col-sm-5 bg-light">
            <h6>Фото</h6>
            <img style="height: 350px" src="{{asset("storage/images/worker/$worker->id.jpg")}}" alt="фото работника">
        </div>
    </div>
@endsection
