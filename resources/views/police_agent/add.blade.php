<?php
date_default_timezone_set("Europe/Prague");
$date = date("Y-m-d");
$time = date("H:i:s");
$default_time = $date.'T'.$time;
?>

@extends('layout.app')
@section('title', 'Add Police Agent')
@section('content')
<a href={{ url()->previous() }} >Back</a>
<br>
<form action="/police_agent/add" method="post" enctype="multipart/form-data" >
    <?php
    use App\Model\PoliceAgentModel;
    use App\Model\PersonModel;
    $titles = [
        PersonModel::COL_SURNAME, 
        PersonModel::COL_NAME,
        PersonModel::COL_ADD,
        PersonModel::COL_DOB,
        'username',
        'password',
        'department',
        'type'
    ];
    ?>
    @foreach($titles as $title)
        @if($title == App\Model\PersonModel::COL_DOB)
            {{$title}} :<br>
                <input type="datetime-local" value={{$default_time}} min="1897-04-01" max={{$default_time}} name={{$title}} ><br><br>

        @elseif($title == App\Model\PersonModel::COL_SURNAME || $title == App\Model\PersonModel::COL_NAME || $title == App\Model\PersonModel::COL_ADD || $title == 'username' || $title == 'password')
            {{$title}} :<br>
            <input type="text" name={{$title}}><br><br>
        
        @elseif($title == 'department')
            {{$title}} :<br>
            <select name={{$title}} id={{$title}}>
                @foreach($places as $place)
                <option value={{$place['id']}}>{{$place['name']}}</option>
                @endforeach
            </select><br><br>
        
        @elseif($title == 'type')
            {{$title}} :<br>
            <select name={{$title}} id={{$title}}>
                <option value=0>Officer</option>
                <option value=1>Crime Scene Investigator</option>
                <option value=2>Detective</option>
                <option value=3>Head of Department</option>
                <option value=4>Chief of Police</option>
            </select>
        @endif
    @endforeach
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="submit"  name="submit" value="Add">
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection

