<?php
use App\CaseModel;use Illuminate\Support\Facades\Schema;
$titles = Schema::getColumnListing(CaseModel::TABLE_NAME);
$pageTitle = 'Cases '.$case[CaseModel::COL_ID];
?>

@extends('layout.app')
@section('title', $pageTitle)
@section('content')
@foreach($titles as $title)
    {{$title}}:<br>
    {{$case[$title]}}
    <br><br>
@endforeach


@endsection
