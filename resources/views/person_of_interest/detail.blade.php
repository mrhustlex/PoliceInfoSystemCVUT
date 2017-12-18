<?php
$title = "Person of interest - POI id:".$id;
?>
@extends('layout.app')
@section('title',$title )
@section('content')
    @if($back == null)
        <a href={{ url()->previous() }}>Back</a>
    @else
        <a href="/person_of_interest/list?case_id={{$case_id}}" >Back</a>
    @endif
    <br>
    <a href="/person_of_interest/testimony/add?poi_id={{$poi["poi_id"]}}" class="btn btn-info" role="button">Add Testimony</a>
    <br>
    <?php
    $roleArr = array();
    foreach ($roles as $role){
        foreach ($role as $key => $value){
            $id = $key."Id";
            $roleArr[$key] = ($value== null)? "No": "id: ".$value[$id];
        }
    }
    ?>
    <br>
    @foreach($roleArr as $key => $value)
        @if($value == "No")
            <a href="/person_of_interest/set_{{$key}}?poi_id={{$poi["poi_id"]}}" class="btn btn-info" role="button">set as {{$key}}</a>
        @endif
    @endforeach
    <div class="container" >
        <div class="row" >
            <div class="col-sm-6" >
                <h3>Role:
                    @foreach($roleArr as $key => $value)
                        @if($value != "No")
                            {{$key}},
                        @endif
                    @endforeach
                </h3>

                <h3>
                    @foreach($roleArr as $key => $value)
                        @if($value != "No")
                            {{$key}}: {{$value}}
                        @endif
                    @endforeach
                </h3>
                @foreach($poi as $key => $value)
                    <h3>{{$key}} : {{$value}}</h3>
                @endforeach
            </div>
            <div class="col-sm-6">
                <h2>Testimony</h2>
                @if($testimony == null)
                    No Testimony for this person.
                @else
                    @foreach($testimony as $items)
                        @foreach($items->toArray() as $key => $value)
                            {{$key}} : {{$value}}
                            <br>
                        @endforeach
                            <br>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection