@extends('layouts.app')

@section('title')
    Работники
@endsection

@section('content')
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/worker/create">принять на работу</a>
@endsection

@section('content2')
    <table  class="table table-striped caption-top">
        <caption>работники</caption>
        <thead>
         <tr>
            <th>id</th>
            <th>Фото</th>
            <th>Работник</th>
            <th>Разряд</th>
            <th>Стаж</th>
            <th>Профессия</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($workers as $worker)
            <tr>
                <td>{{$worker->id}}</td>
                <td><img style="height: 80px" src="{{asset("storage/images/worker/".$worker->id.".jpg")}}" alt="фото работника">
                </td>
                <td>{{$worker->surname. ' '.$worker->firstName. ' '.$worker->patronymic}}</td>
                <td>{{$worker->category}}</td>
                <td>{{$worker->experience}}</td>
                <td>{{$worker->profession->title}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success" href="/worker/edit/{{$worker->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                    <a class="btn btn-outline-danger" href="/worker/delete/{{$worker->id}}" title="Удалить">
                        уволить
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
