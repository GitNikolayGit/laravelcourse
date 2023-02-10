@extends('layouts.app')

@section('title')
    Запчасти
@endsection

@section('content')
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/park/create">Добавить</a>
@endsection
'title',
'time',
'price',
'defect_id'
@section('content2')
    <table  class="table table-striped caption-top">
        <caption>запчасти</caption>
        <thead>
        <tr>
            <th>id</th>
            <th>Наименование</th>
            <th>Время</th>
            <th>Стоимость</th>
            <th>Категория</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($services as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->title}}</td>
                <td>{{$service->time}}</td>
                <td>{{$service->price}}</td>
                <td>{{$service->defect->title}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-success" href="/park/edit/{{$service->id}}" title="Изменить...">
                        <i class="bi bi-pencil"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
