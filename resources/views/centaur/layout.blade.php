<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
        <script type="text/javascript" src="{{ url('/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- ... -->

        <!-- ... -->
  <link rel="stylesheet" href="{{ url('/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
   
  <script type="text/javascript" src="{{ url('/bower_components/moment/min/moment.min.js') }}"></script>
  <script type="text/javascript" src="{{ url('/bower_components/bootstrap/bootstrap.min.js') }}"></script>

        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <link rel="stylesheet" href="{{ url('calendar/fullcalendar.css') }}">
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript" src="{{ url('calendar/fullcalendar.js') }}"></script>
  <script type="text/javascript" src="{{ url('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        
                        @if (Sentinel::check() && Sentinel::inRole('administrator'))
                            {{-- <li class="{{ Request::is('users*') ? 'active' : '' }}"><a href="{{ route('users.index') }}">Users</a></li>
                            <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}">Roles</a></li> --}}
                            <li class="{{ Request::is('dashboard*') ? 'active' : '' }}"><a href="{{ url('dashboard') }}">Home</a></li>
                            <li class="{{ Request::is('rooms*') ? 'active' : '' }}"><a href="{{ url('rooms') }}">Rooms</a></li>
                            <li class="{{ Request::is('foods*') ? 'active' : '' }}"><a href="{{ url('foods') }}">Foods</a></li>
                            <li class="{{ Request::is('services*') ? 'active' : '' }}"><a href="{{ url('services') }}">Services</a></li>
                            <li class="{{ Request::is('reports*') ? 'active' : '' }}"><a href="{{ url('reports') }}">Reports</a></li>
                            <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @elseif (Sentinel::check())
                        <li class="{{ Request::is('bookings*') ? 'active' : '' }}"><a href="{{ url('bookings') }}">My Bookings</a></li>
                            
                            <li class="{{ Request::is('available/rooms*') ? 'active' : '' }}"><a href="{{ url('available/rooms') }}">Rooms</a></li>
                            
                           
                            <li><a href="{{ route('auth.logout') }}">Log Out</a></li>
                        @elseif(Sentinel::guest())
                            <li><a href="{{ route('auth.login.form') }}">Login</a></li>
                            <li><a href="{{ route('auth.register.form') }}">Register</a></li>
                           
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container" style="padding-top:100px; ">
            @include('Centaur::notifications')
            @yield('content')
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
       
        <!-- Latest compiled and minified Bootstrap JavaScript -->
       
        <script src="{{ asset('restfulizer.js') }}"></script>

       



        
    </body>
</html>