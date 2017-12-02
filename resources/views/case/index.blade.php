@extends('layout.app')
@section('title', 'Cases')
@section('content')
    <a href="/case/add" class="btn btn-info" role="button">Add Case</a>
    <br>
    @include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/case/detail?case_id=", 'id' => $id])


@endsection