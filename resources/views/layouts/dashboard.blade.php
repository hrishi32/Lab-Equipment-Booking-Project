<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>BioLab Dashboard</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="{{ asset('assets/css/paper-dashboard.css') }}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="{{ asset('http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Muli:400,300')}}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    
</head>
<body>
<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    BioLab Dashboard
                </a>
            </div>

            <ul class="nav">
                <!-- <li @yield('dashboardactive')>
                    <a href="/dashboard">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li> -->
                <li @yield('calendaractive')>
                    <a href="/dashboard/calendar">
                        <i class="ti-panel"></i>
                        <p>Booking Calendar</p>
                    </a>
                </li>
                <li @yield('tableactive')>
                    <a href="/dashboard/table">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li @yield('myBookingactive')>
                    <a href="/dashboard/myBooking">
                        <i class="ti-view-list-alt"></i>
                        <p>My Bookings</p>
                    </a>
                </li>
                <!-- <li @yield('useractive')>
                    <a href="/dashboard/user">
                        <i class="ti-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li @yield('typographyactive')>
                    <a href="/dashboard/typography">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li @yield('iconsactive')>
                    <a href="/dashboard/icons">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li @yield('mapsactive')>
                    <a href="/dashboard/maps">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li @yield('notificationsactive')>
                    <a href="/dashboard/notifications">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="/dashboard/upgrade">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                        
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard/table') }}">{{ __('All Bookings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard/table#tooltt') }}">{{ __('All Tools') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/dashboard/table#usertt') }}">{{ __('All Users') }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    
                        <!-- <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
								<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li> -->
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        
        @yield('content')


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="http://prabhkarpd7284.github.io">
                                Prabhakar Prasad
                            </a>
                        </li>
                
                        <li>
                            <a href="http://github.com/prabhakarpd7284/lab-booking-portal">
                               Github
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                MIT Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://prabhkarpd7284.github.io">Prabhakar Prasad</a>
                </div>
            </div>
        </footer>
    </div>    
</div>
</body>
 <!--   Core JS Files   -->
 <script src="{{ asset('assets/js/jquery-1.10.2.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="{{ asset('assets/js/bootstrap-checkbox-radio.js') }}"></script>

	<!--  Charts Plugin -->
	<!-- <script src="{{ asset('assets/js/chartist.min.js') }}"></script> -->

    <!--  Notifications Plugin    -->
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script type="text/javascript" src="{{ asset('https://maps.googleapis.com/maps/api/js') }}"></script> -->

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="{{ asset('assets/js/paper-dashboard.js') }}"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('assets/js/demo.js') }}"></script>
    @yield('extrascript')
    
</html>
