@extends('layout.app')
@section('title', $agent[\App\PoliceAgentModel::COL_NAME])
@section('content')
<h1>
    ID:
{{$agent[\App\PoliceAgentModel::COL_ID]}}
<br>Name:
    {{$agent[\App\PoliceAgentModel::COL_NAME]}}
    <br>Position:
{{$agent[\App\PoliceAgentModel::COL_POS]}}
    <br>Num_Case:
{{$agent[\App\PoliceAgentModel::COL_NUM_CASE]}}
</h1>

<a href={{ url()->previous() }}>Back</a>
    @endsection