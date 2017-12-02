@extends('layout.app')
@section('title', 'Police Agent')
@section('content')
    <a href="/police_agent/add" class="btn btn-info" role="button">Add Member</a>
<br>
@include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/police_agent/detail?police_id=", 'id' => $id])
@endsection
