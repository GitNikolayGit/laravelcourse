@extends('layouts.app')

@section('title')
    редактирование
@endsection

@section('content')


@endsection


@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <h6>прием на работу</h6>
            <!-- изменить работника -->
            <form class="bg-light text-center border border-info rounded w-100 p-3" action="/worker/create" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <input type="text" placeholder="фамилия" class="form-control" id="surname" name="surname" value="{{old('surname')}}">
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
                    <label for="category">Разряд</label>
                    <input type="text" class="form-control" id="category" name="category"
                           value="{{old('category')}}">
                </div>
                <div class="mb-1">
                    <label for="experience">Стаж</label>
                    <input type="text" class="form-control" id="experience" name="experience"
                           value="{{old('experience')}}">
                </div>


                <div class="mb-1">
                    <label for="profession">Профессия</label>
                    <select class="form-control" id="profession" name="profession">
                        <option></option>
                        @foreach(\App\Models\Profession::all() as $dir)
                            <option value="{{$dir->id}}">{{$dir->title}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-1">
                    <label for="photo-client">Фото</label>
                    <p><input type="file" class="form-control" name="photo" id="photo"></p>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-success">Принять</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>
        </div>

    </div>
@endsection
