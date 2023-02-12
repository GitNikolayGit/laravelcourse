@extends('layouts.app')

@section('title')
    создание заявки
@endsection

@section('content')


@endsection


@section('content2')
    <div class="col-sm p-1 row">
        <div class="col-6 p-1 bg-light ">
            <!-- изменить клиента -->
            <form class="p3 bg-light text-center w-100" action="/client/edit/{{$client->id}}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="mb-1">
                    <label for="surname">Клиент</label>
                    <input type="text" class="form-control" id="surname" name="surname" value="{{$client->surname}}">
                </div>
                <div class="mb-1">
                    <label for="firstName">Имя</label>
                    <input type="text" class="form-control" id="firstName" name="firstName"
                           value="{{$client->firstName}}">
                </div>
                <div class="mb-1">
                    <label for="patronymic">Отчество</label>
                    <input type="text" class="form-control" id="patronymic" name="patronymic"
                           value="{{$client->patronymic}}">
                </div>
                <div class="mb-1">
                    <label for="passport">Паспорт</label>
                    <input type="text" class="form-control" id="passport" name="passport" value="{{$client->passport}}">
                </div>
                <div class="mb-1">
                    <label for="birhday">Дата рождения</label>
                    <input type="text" readonly class="form-control" id="birhday" name="birhday"
                           value="{{$client->birhday}}">
                </div>

                <div class="mb-1">
                    <label for="address">Адрес</label>
                    <input type="text" class="form-control" id="address" name="address"
                           value="{{$client->address}}">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-outline-danger">Изменить</button>
                    <a href="{{url()->previous()}}" class="btn btn-outline-success">Отмена</a>
                </div>
            </form>

        </div>
        <div class="col-sm-5 bg-light">
            <h6>Фото</h6>
            <img style="height: 350px" src="{{asset("storage/images/person/$client->id.jpg")}}" alt="фото машины">
        </div>
    </div>
@endsection
