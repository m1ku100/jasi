<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JASI | Jasa Antar ASI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co"/>
    <meta name="keywords"
          content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive"/>
    <meta name="author" content="FreeHTML5.co"/>

    <!--
    //////////////////////////////////////////////////////

    FREE HTML5 TEMPLATE
    DESIGNED & DEVELOPED by FreeHTML5.co

    Website: 		http://freehtml5.co/
    Email: 			info@freehtml5.co
    Twitter: 		http://twitter.com/fh5co
    Facebook: 		https://www.facebook.com/fh5co

    //////////////////////////////////////////////////////
     -->

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content=""/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:url" content=""/>
    <meta name="twitter:card" content=""/>

    <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,600,400italic,700' rel='stylesheet'
          type='text/css'>

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{asset('shape/css/animate.css')}}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{asset('shape/css/icomoon.css')}}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{asset('shape/css/bootstrap.css')}}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{asset('shape/css/magnific-popup.css')}}">


    <!-- Theme style  -->
    <link rel="stylesheet" href="{{asset('shape/css/style.css')}}">


    <script src="{{asset('shape/js/modernizr-2.6.2.min.js')}}"></script>

    <script src="{{asset('shape/js/respond.min.js')}}"></script>

    <style>

        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }

        #right-panel {
            margin: 20px;
            border-width: 2px;
            width: 20%;
            height: 600px;
            float: left;
            text-align: left;
            padding-top: 0;
        }
        #directions-panel {
            margin-top: 10px;
            background-color: #FFFFFF;
            padding: 10px;
            overflow: scroll;
            height: 350px;
        }

        .map {
            width: 1920px;
            height: 1080px;
            margin: calc(5vh - 10px) auto;
            box-shadow: 0 0 40px -10px black;
            background: rgb(240, 240, 240);
            font-family: 'Montserrat', sans-serif;
            max-width: calc(100vw - 60px)
        }

        #map {
            width: 65%;
            height: 1080px;
            display: inline-block
        }

        .map-c {
            float: right;
            width: 35%;
            height: 100%;
            padding: 25px;
            box-sizing: border-box
        }

        h1 {
            margin: 0;
            font-weight: normal;
            color: rgb(60, 60, 70);
            font-size: 28px
        }

        p {
            font-size: 13px;
            margin-top: 20px;
            margin-bottom: 30px
        }

        .det {
            font-size: 12px;
            margin-bottom: 15px
        }

        button {
            margin: 15px 4px;
            padding: 13px 9px;
            display: inline-block;
            cursor: pointer;
            background: none;
            color: #546973;
            border: 2px solid #78909C;
            transition: all 0.3s;
            border-radius: 8px;
            outline: 0
        }

        .fa-envelope:after {
            content: 'Email';
            margin: 8px 13px 0
        }

        @media only screen and (max-width: 720px) {
            .map {
                height: 450px;
                margin: calc(50vh - 225px) auto;
                overflow: hidden
            }

            #map {
                width: 100%;
                height: 200px;
            }

            .map-c {
                float: right;
                width: 100%;
            }

            button {
                float: right;
                margin-top: -75px
            }
        }

        @media only screen and (max-width: 460px) {
            p {
                display: none
            }

            h1 {
                margin-bottom: 20px
            }

            button {
                float: none;
                margin-top: 10px
            }

            .det {
                margin-bottom: 9px
            }
        }
    </style>
    <script>
        var map;
        //
        // function initMap() {
        //     var iposition = {lat: -7.2770975, lng: 112.7174085},
        //     map = new google.maps.Map(document.getElementById('map'), {
        //         center: iposition,
        //         zoom: 13
        //     });
        //
        //
        //
        //     marker = new google.maps.Marker({
        //         map: map,
        //         draggable: true,
        //         animation: google.maps.Animation.DROP,
        //         position: {lat:-7.2770975, lng: 112.7}
        //     });
        //     marker.addListener('click', toggleBounce);
        // }
        //
        // function toggleBounce() {
        //     if (marker.getAnimation() !== null) {
        //         marker.setAnimation(null);
        //     } else {
        //         marker.setAnimation(google.maps.Animation.BOUNCE);
        //     }
        // }

        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: {lat: -7.2770975, lng: 112.7174085}
            });
            directionsDisplay.setMap(map);

            document.getElementById('submit').addEventListener('click', function() {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            });
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            var waypts = [];
            var checkboxArray = document.getElementById('waypoints');
            for (var i = 0; i < checkboxArray.length; i++) {
                if (checkboxArray.options[i].selected) {
                    waypts.push({
                        location: checkboxArray[i].value,
                        stopover: true
                    });
                }
            }

            directionsService.route({
                origin: document.getElementById('start').value,
                destination: document.getElementById('end').value,
                waypoints: waypts,
                optimizeWaypoints: true,
                travelMode: 'DRIVING'
            }, function(response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);
                    var route = response.routes[0];
                    var summaryPanel = document.getElementById('directions-panel');
                    summaryPanel.innerHTML = '';
                    // For each route, display summary information.
                    for (var i = 0; i < route.legs.length; i++) {
                        var routeSegment = i + 1;
                        summaryPanel.innerHTML += '<b>Rute Perjalanan: ' + routeSegment +
                            '</b><br>';

                        summaryPanel.innerHTML += '';
                        summaryPanel.innerHTML +='<input type="hidden" class="form-control" name="pengambilan" value="'+route.legs[i].start_address+'" ></br> Pegambilan dari : ' + route.legs[i].start_address + ' </br> ';
                        summaryPanel.innerHTML += '<input type="hidden" class="form-control" name="tujuan" value="'+route.legs[i].end_address+'" ></br> Tujuan Pengiriman : '+route.legs[i].end_address + '<br>';
                        summaryPanel.innerHTML += '<input type="hidden" class="form-control" name="user_id" value="@guest @else{{ Auth::user()->id }}@endguest" >';
                        var km = route.legs[i].distance.text;


                        if(km.length<=7)
                        {
                            var jarak = km.substring(0,4);
                        }
                        else if(km.length>=7)
                        {
                            var jarak = km.substring(0,5);
                        }


                        summaryPanel.innerHTML += '<input type="hidden" class="form-control" name="is_nyampek" value="0">';
                        summaryPanel.innerHTML += '<input type="hidden" class="form-control" name="jarak" value="'+km+'" ><h4>Jarak Yang Ditempuh : '+ km +'</h4>'  + '<br>';

                        summaryPanel.innerHTML += '<input type="hidden"  class="form-control" name="harga" value="'+jarak*3500+'" ><h4>Biaya : Rp. '+ jarak*3500 +'</h4>'  + '<br>';

                        summaryPanel.innerHTML += '<textarea name="catatan" class="form-control" placeholder="Tambahkan Catatan untuk mempermudah Kerja Kurir kami"></textarea>';

                        summaryPanel.innerHTML += '';

                    }
                } else {
                    window.alert('Destination or Your Current Position is  ' + status);
                }
            });
        }


    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0Uiuh6Q2hwWC3at9TbQqe4ZL6XWmp6bw&callback=initMap"
            async defer></script>

</head>
<body>

<div class="fh5co-loader"></div>

<div id="page">
    <nav class="fh5co-nav" role="navigation">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div id="fh5co-logo"><a href="{{url('/')}}">Jasi<span>.</span></a></div>
                </div>
                <div class="col-xs-12 text-center menu-1">
                    <ul>

                        <li @if (Route::currentRouteName() == 'landing') class="active" @endif ><a
                                    href="{{route('landing')}}">Home</a></li>

                        <li class="has-dropdown">
                            <a>Services</a>
                            <ul class="dropdown">
                                <li><a href="{{route('order')}}">Pengantaran ASI</a></li>
                                <li><a href="{{route('portal')}}">Portal ASI</a></li>
                            </ul>
                        </li>


                        <li @if (Route::currentRouteName() == 'about') class="active" @endif><a
                                    href="{{route('about')}}">About</a></li>

                        <li @if (Route::currentRouteName() == 'blog.general') class="active" @endif><a href="{{route('blog.general')}}">Blog</a>
                        </li>

                        <li @if (Route::currentRouteName() == 'contact') class="active" @endif><a
                                    href="{{route('contact')}}">Contact</a></li>

                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="has-dropdown">


                                <a>{{ Auth::user()->name }} <span class="caret"></span></a>


                                <ul class="dropdown">
                                    @if( Auth::user()->role == 'admin')
                                        <li>
                                            <a href="{{route('dashboard')}}">dashboard Admin</a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest

                    </ul>
                </div>
            </div>

        </div>
    </nav>

    @yield('content')

    <footer id="fh5co-footer" role="contentinfo">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-4 fh5co-widget ">
                    <h3>Shape.</h3>
                    <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta
                        adipisci architecto culpa amet.</p>
                    <p><a href="#">Learn More</a></p>
                </div>
                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">About</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Meetups</a></li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Handbook</a></li>
                        <li><a href="#">Held Desk</a></li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-4 col-xs-6 col-md-push-1 ">
                    <ul class="fh5co-footer-links">
                        <li><a href="#">Find Designers</a></li>
                        <li><a href="#">Find Developers</a></li>
                        <li><a href="#">Teams</a></li>
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">API</a></li>
                    </ul>
                </div>
            </div>

            <div class="row copyright">
                <div class="col-md-12 text-center">
                    <p>
                        <small class="block">&copy; 2016 Free HTML5. All Rights Reserved.</small>
                        <small class="block">Designed by <a href="http://freehtml5.co/" target="_blank">FreeHTML5.co</a>
                            Demo Images: <a href="http://pixeden.com/" target="_blank">Pixeden</a> &amp; <a
                                    href="http://unsplash.com/" target="_blank">Unsplash</a></small>
                    </p>
                    <p>
                    <ul class="fh5co-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                    </p>
                </div>
            </div>

        </div>
    </footer>
</div>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<!-- jQuery -->
<script src="{{asset('shape/js/jquery.min.js')}}"></script>
<!-- jQuery Easing -->
<script src="{{asset('shape/js/jquery.easing.1.3.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('shape/js/bootstrap.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('shape/js/jquery.waypoints.min.js')}}"></script>
<!-- countTo -->
<script src="{{asset('shape/js/jquery.countTo.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('shape/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('shape/js/magnific-popup-options.js')}}"></script>
<!-- Main -->
<script src="{{asset('shape/js/main.js')}}"></script>
@stack('js')
</body>
</html>

