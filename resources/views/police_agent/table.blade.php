@section('content')
    @foreach($linkAgents as $link => $name)
    <a href={{$link}} class="btn btn-info" role="button">{{$name}}</a>
    @endforeach
@if($columnNames != null)
    <table class="table table-striped" style="padding:2% 2% 0 0;">
        <thead>
        <tr>
            @foreach($columnNames as $col)
                <th scope="col">{{$col}}</th>
            @endforeach
        </tr>
   		</thead>
@endif
		@if($items != null)
        @foreach($items as $item)
		<tr>
            @foreach($columnNames as $col)
            <td>{{$item[$col]}}</td>
            @endforeach
        </tr>
        @endforeach
        @endif
@if(sizeof($items) == 0)
    <h5>There's No Police Agents</h5>
@endif
@endsection