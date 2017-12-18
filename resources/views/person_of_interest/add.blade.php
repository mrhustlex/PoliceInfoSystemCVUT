<?php $title =  'Case id: '.$case_id.' - Add Person Of Interest';
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
    <form action="/person_of_interest/add" method="post" enctype="multipart/form-data" >
        Case id : {{$case_id}}
        <input type="hidden" name="case_id" value="{{$case_id}}">
        <br>
        <input name='name' placeholder="Name">
        <br>
        <input name='surname' placeholder="Surname">
        <br>
        Address:
        <br>
        <textarea rows="4" cols="50" name='address' placeholder="Address"></textarea>
        <br>
        Date of Birth: <br>
        <input type="datetime-local" value={{$default_time}} name="date"><br><br>
        <br>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit"  name="submit" value="Add">
    </form>
@endsection