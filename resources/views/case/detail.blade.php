<?php
use App\CaseModel;use Illuminate\Support\Facades\Schema;
$titles = Schema::getColumnListing(CaseModel::TABLE_NAME);
$id = $case[CaseModel::COL_ID];
$solved = $case[CaseModel::COL_SOLVED]=="No"? false:true;
$caseName = $case[CaseModel::COL_NAME];
$pageTitle = 'Cases '.$id.' - '. $caseName;
$buttonName = ($case[CaseModel::COL_CLOSED] == "No")? "Close_the_case":"Open the case";
?>

@extends('layout.app')
@section('title', $pageTitle)
@section('content')
    @if(!$solved)
        <a href="/case/close?case_id={{$id}}" class="btn btn-info" role="button">{{$buttonName}}</a>
        <a href="/case/close?solve=1&case_id={{$id}}" class="btn btn-info" role="button">Solve the Case</a>
    @else
        <h1>{{$pageTitle}} is Already Solved !</h1>
    @endif
    <br><br>
@foreach($titles as $title)
    {{$title}}:<br>
    {{$case[$title]}}
    <br><br>
@endforeach


@endsection
