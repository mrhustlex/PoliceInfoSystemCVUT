@extends('layout.app')
@section('title', 'Person Of Interest')
@section('content')
    <a href="/person_of_interest/add?case_id={{$case_id}}" class="btn btn-info" role="button">Add Person of Interest</a>
    @include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/person_of_interest/detail?poi_id=", 'id' => "poi_id"])
@endsection
