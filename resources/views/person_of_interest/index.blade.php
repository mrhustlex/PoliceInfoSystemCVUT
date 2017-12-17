@extends('layout.app')
@section('title', 'Person Of Interest')
@section('content')
    <a href="" class="btn btn-info" role="button">Add Person of Interest</a>
    {{--<a href="" class="btn btn-info" role="button">Add Testimony</a>--}}
    {{--<a href="" class="btn btn-info" role="button">View Testimony</a>--}}
    @include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/person_of_interest/detail?poi_id=", 'id' => "poi_id"])
@endsection
