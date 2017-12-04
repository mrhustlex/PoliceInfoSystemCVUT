<?php
    date_default_timezone_set("Europe/Prague");
    $date = date("Y-m-d");
    $time = date("H:i:s");
    $default_time = $date.'T'.$time;
?>
@extends('layout.app')
@section('title', 'Add Case')
@section('content')
    <form action="/case/add" method="post" enctype="multipart/form-data" >
       <?php
        use App\CaseModel;use Illuminate\Support\Facades\Schema;
        $titles = Schema::getColumnListing(CaseModel::TABLE_NAME);
        $titles = array_diff($titles, [CaseModel::COL_ID, CaseModel::COL_DEP_ID, CaseModel::COL_O_DAY]);
        ?>
        @foreach($titles as $title)
            @if($title == \App\CaseModel::COL_CRIME_DATE || $title == \App\CaseModel::COL_O_DAY)
                   {{$title}} :<br>
                       <input type="datetime-local" value={{$default_time}} name={{$title}} ><br><br>
                @elseif($title == \App\CaseModel::COL_CLOSED ||$title == \App\CaseModel::COL_SOLVED)
                   {{$title}} :<br>
                   <select name={{$title}} id={{$title}}>
                       <option>Yes</option>
                       <option selected>No</option>
                   </select>
                <br><br>
                @elseif($title == \App\CaseModel::COL_TYPE)
                   {{$title}} :<br>
                   <select name={{$title}} id={{$title}}>
                       <option selected>Normal</option>
                       <option>Drug crimes</option>
                       <option>Street crime</option>
                       <option>Organized crime</option>
                       <option>Political crime</option>
                       <option>Victimless crime</option>
                   </select>
                   <br><br>
               @else
           {{$title}} :<br>
               <input name={{$title}}><br><br>
               @endif
           @endforeach
        <input type="hidden" name="_token" value="{{csrf_token()}}">
           <br>
        <input type="submit"  name="submit" value="Add">
    </form>
@endsection
