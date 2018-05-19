<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/img/apple-icon.png')}}"/>
    <link rel="icon" type="image/png"  href="{{asset('admin/img/favicon.png')}}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Material Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap core CSS     -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}"  rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="{{asset('admin/css/material-dashboard.css?v=1.2.0')}}"  rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('admin/css/demo.css')}}"  rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=5zm9sroyyw92mdbkdqpna5oo2r7vnf0e3exupkiguygzg097"></script>

    <script>
        tinymce.init(
            {selector: 'textarea',
                menubar : false

            });
    </script>
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text">
                JASI
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li @if (Route::currentRouteName() == 'dashboard') class="active" @endif >
                    <a href="{{route('dashboard')}}">
                        <i class="material-icons">dashboard</i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li @if (Route::currentRouteName() == 'user') class="active" @endif>
                    <a href="{{route('user')}}">
                        <i class="material-icons">supervisor_account
                        </i>
                        <p>Manajemen User</p>
                    </a>
                </li>
                <li @if (Route::currentRouteName() == 'blog' ) class="active" @endif >
                    <a href="{{route('blog')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Manajemen Blog</p>
                    </a>
                </li>
                <li >
                    <a href="">
                        <i class="material-icons">dns
                        </i>
                        <p>Manajemen Menu</p>
                    </a>
                </li>
                <li >
                    <a href="">
                        <i class="material-icons">settings
                        </i>
                        <p>Setting Website</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="material-icons">power_settings_new
                        </i>
                        <p>Log Out</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>

    </div>
    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                </div>
            </div>
        </nav>
@yield('content')
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>
    </div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('admin/js/jquery-3.2.1.min.js')}}"  type="text/javascript"></script>
<script src="{{asset('admin/js/bootstrap.min.js')}}"  type="text/javascript"></script>
<script src="{{asset('admin/js/material.min.js')}}"  type="text/javascript"></script>
<!--  Charts Plugin -->
<script src="{{asset('admin/js/chartist.min.js')}}" ></script>
<!--  Dynamic Elements plugin -->
<script src="{{asset('admin/js/arrive.min.js')}}" ></script>
<!--  PerfectScrollbar Library -->
<script src="{{asset('admin/js/perfect-scrollbar.jquery.min.js')}}" ></script>
<!--  Notifications Plugin    -->
<script src="{{asset('admin/js/bootstrap-notify.js')}}" ></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Material Dashboard javascript methods -->
<script src="{{asset('admin/js/material-dashboard.js?v=1.2.0')}}" ></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('admin/js/demo.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
@stack('js')

</html>