@extends('layout.app')
@section('title', 'Police Agent')
@section('content')

    <form action="/police_agent/add">
        <input type="submit" value="Add Member" />
    </form>


    <form action="/police_agent/">
        <input >
        <input type="submit" value="Search" />
    </form>

@if($agents != null)
    <table class="table table-striped" style="padding:2% 2% 0 0;">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Position</th>
            <th scope="col">Detail</th>
        </tr>
        </thead>
        <tbody>


@foreach($agents as $agent)
    <tr>
        <th scope={{$agent[\App\PoliceAgentModel::COL_ID]}}>{{$agent[\App\PoliceAgentModel::COL_ID]}}</th>
        <td>{{$agent[\App\PoliceAgentModel::COL_NAME]}}</td>
        <td>{{$agent[\App\PoliceAgentModel::COL_POS]}}</td>
        <td><a href="/police_agent/detail?police_id={{$agent[\App\PoliceAgentModel::COL_ID]}}">Detail</a> </td>

    </tr>
@endforeach
        </tbody>
    </table>
@endif
@endsection
</body>
</html>