@extends('layouts.app')

@section('title')
    Запчасти
@endsection

@section('content')
    <p></p>
    <a class="btn btn btn btn-outline-secondary w-100 m-1" href="/park/create">Добавить</a>
@endsection

@section('content2')
    @include('inc.park-table')
@endsection
