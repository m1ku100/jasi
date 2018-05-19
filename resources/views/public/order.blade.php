@extends('layouts.global')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">Our Blog</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-blog" class="fh5co-bg-section">
        <div class="map">
            <div id="map"></div>
            <div class="map-c">
                <h1>
                    @guest

                    @else
                        {{ Auth::user()->name }}
                    @endguest
                </h1>
                <p>Avanza [K908A</p>
                <div class="det"><i class="fa fa-map-marker"></i> Jalan Bibis Karah</div>
                <div class="det"><i class="fa fa-phone"></i> 082338434394</div>
                <div class="det"><i class="fa fa-globe"></i> 4.8 Stars</div>
                <center>
                    <button class="fa ">Directions</button>
                    <button class="fa ">Pesan</button>
                </center>
            </div>
        </div>
    </div>

    <div id="fh5co-started">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Let's work together</span>
                    <h2>Start Your Project</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident.
                        Odit ab aliquam dolor eius.</p>
                    <p>
                        <button type="submit" class="btn btn-default">Get In Touch</button>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection