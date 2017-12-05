<?php
use App\CaseModel;
use App\Http\caseHandler;

$linkCase = [
    "/case/add" =>"Add Case",
    "/case?type=".caseHandler::UNSOLVED_CASE=>"UNSOLVED_CASE",
    "/case?type=".caseHandler::SOLVED_CASE=>"SOLVED_CASE",
    ]
?>
@extends('layout.app')
@section('title', 'Cases')
@section('content')
    @foreach($linkCase as $link => $name)
    <a href={{$link}} class="btn btn-info" role="button">{{$name}}</a>
@endforeach

    {{--<br>--}}
    {{--<nav>--}}
        {{--<a href={{$apiLink}}>Show {{$solvedNav}}</a>--}}
    {{--</nav>--}}

    {{--<a href="/case/add" >UnSolve</a>--}}

    @include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/case/detail?CaseID=", 'id' => $id])
    @if(sizeof($items) == 0)
        <h5>There's No Cases</h5>
    @endif

@endsection