<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
@section('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
@show
<html>
<Title>@yield('title')</Title>
<head>
    @section('navBar')
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Police Information System</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li><a href="/police_agent">Police Agent Management</a></li>
                        <li><a href="/case">Case Management</a></li>
                    </ul>
                    {{--<ul class="nav navbar-nav navbar-right">--}}
                        {{--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>--}}
                        {{--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </nav>
    @show

</head>
<body>
@if(Auth::check())
    <a href="/logout">Logout</a>
@else
    <a href="/login">Login</a>

@endif
<section style="padding-left: 2vw;color: #5e5e5e;">
    @yield('content')
</section>
</body>
<footer style="background: white;height: 10vh; position: relative;">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
    @yield('footer')
</footer>
</html>


<?php
/**
 * Created by PhpStorm.
 * User: mok00
 * Date: 11/28/2017
 * Time: 11:08 AM
 */