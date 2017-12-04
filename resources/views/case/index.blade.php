<?php
use App\CaseModel;
$solved = ($items->first()[CaseModel::COL_SOLVED] != "No");
$apiLink = $solved?"/case":"/case?solved=1";
$solvedNav = $solved?"Unsolved Cases":"Solved Cases";
$faker = Faker\Factory::create();
//echo $faker->time('Y-m-d H:i:s');


?>
@extends('layout.app')
@section('title', 'Cases')
@section('content')
    <a href="/case/add" class="btn btn-info" role="button">Add Case</a>
    <br>
    <nav>
        <a href={{$apiLink}}>Show {{$solvedNav}}</a>
    </nav>

    {{--<a href="/case/add" >UnSolve</a>--}}

    @include('layout.show_detail',['column' => $columnName, 'items' => $items, 'detail_api' =>"/case/detail?case_id=", 'id' => $id])
    @if(sizeof($items) == 0)
        <h5>There's No Cases</h5>
    @endif

@endsection