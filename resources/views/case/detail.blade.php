<?php
use App\CaseModel;use Illuminate\Support\Facades\Schema;
$titles = Schema::getColumnListing(CaseModel::TABLE_NAME);
$id = $case[CaseModel::COL_ID];
$pageTitle = 'Cases '.$id;
$buttonName = ($case[CaseModel::COL_CLOSED] == "No")? "Close_the_case":"Open the case";
?>

@extends('layout.app')
@section('title', $pageTitle)
@section('content')
    <a href="/case/close?case_id={{$id}}" class="btn btn-info" role="button">{{$buttonName}}</a>
    <br>
@foreach($titles as $title)
    {{$title}}:<br>
    {{$case[$title]}}
    <br><br>
@endforeach


@endsection
