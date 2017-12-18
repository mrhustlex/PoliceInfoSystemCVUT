<?php $title =  'POIid: '.$poi_id.' - Add Testimony';
    date_default_timezone_set("Europe/Prague");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $default_time = $date.'T'.$time;
?>
@extends('layout.app')
@section('title',$title)
@section('content')
    <a href={{ url()->previous() }}>Back</a>
    <br>
    <form action="/person_of_interest/testimony/add" method="post" enctype="multipart/form-data" >
        Person of Interest id : {{$poi_id}}
        <input type="hidden" name="poi_id" value="{{$poi_id}}">
        <br>
        Type of testimony:<br>
        <input name='type' placeholder="type">
        <br>
        Date: <br>
        <input type="datetime-local" value={{$default_time}} name="date"><br>
        <br>
        Statement:
        <br>
        <textarea rows="4" cols="50" name='statement' placeholder="Statement"></textarea>
        <br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit"  name="submit" value="Add">
    </form>
@endsection
