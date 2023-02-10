@extends('layouts.app')

@section('title')
    Запчасти
@endsection

@section('content')
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/park/create">Добавить</a>
@endsection

@section('content2')
    <table  class="table table-striped caption-top">
        <caption>запчасти</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>Фото</th>
            <th>Наименование</th>
            <th>Цена</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($parks as $park)
            <tr>
                <td>{{$park->id}}</td>
                <td><img style="height: 80px" src="{{asset("storage/images/park/".$park->id.".jpg")}}" alt="фото запчасти">
                </td>
                <td>{{$park->title}}</td>
                <td>{{$park->price}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success" href="/park/edit/{{$park->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
