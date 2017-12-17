@extends('layout.app')
@section('title', "Person of interest - ")
@section('content')
    <a href={{ url()->previous() }}>Back</a>
<br><?php
            $roleArr = array();
    foreach ($roles as $role){
            foreach ($role as $key => $value){
                $id = $key."Id";
                $roleArr[$key] = ($value== null)? "No": "Yes, id:".$value[$id];
            }
        }
    ?>
    @foreach($roleArr as $key => $value)
        <h3>{{$key}} : {{$value}}</h3>
        @if($value == "No")
        <a href="/person_of_interest/set_{{$key}}?poi_id={{$poi["poi_id"]}}" class="btn btn-info" role="button">set {{$key}}</a>
        @endif
        <br>
    @endforeach

@foreach($poi as $key => $value)
    <h3>{{$key}} : {{$value}}</h3>
    <br>
@endforeach

@endsection