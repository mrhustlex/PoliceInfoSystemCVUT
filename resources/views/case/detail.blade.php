<?php
use App\CaseModel;use Illuminate\Support\Facades\Schema;
$titles = Schema::getColumnListing(CaseModel::TABLE_NAME);
$id = $case[CaseModel::COL_ID];
$openOrClose = ($case[CaseModel::COL_CLOSED] == 0)? "/case/close?CaseID=":"/case/open?CaseID=";
$openOrClose = $openOrClose.$id;
$solved = $case[CaseModel::COL_SOLVED]==0? false:true;
$caseName = $case[CaseModel::COL_NAME];
$pageTitle = 'Cases '.$id.' - '. $caseName;
$buttonName = ($case[CaseModel::COL_CLOSED] == 0)? "Close_the_case":"Open the case";

?>

@extends('layout.app')
@section('title', $pageTitle)
@section('content')
    @if(!$solved)
        <a href={{$openOrClose}} class="btn btn-info" role="button">{{$buttonName}}</a>
        <a href="/case/solve?CaseID={{$id}}" class="btn btn-info" role="button">Solve the Case</a>
    @else
        <h1>{{$pageTitle}} is Already Solved !</h1>
    @endif
    <br><br>
@foreach($titles as $title)
    @if($title == \App\CaseModel::COL_SOLVED || $title == \App\CaseModel::COL_CLOSED)
        {{$title}}:<br>
        {{($case[$title]==0)?"No": "Yes"}}
    @else
    {{$title}}:<br>
    {{$case[$title]}}
    @endif
    <br><br>
@endforeach


@endsection
