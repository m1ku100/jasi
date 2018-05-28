@extends('layouts.global')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">Busy? Take Easy With JASI.</h1>
                            <p>
                                @guest
                                    <a href="{{ route('register') }}"  class="btn btn-primary">Daftar</a> or
                                    <a href="{{ route('login') }}" class="link-watch ">Login</a>
                                @else

                                @endguest
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-services" class="fh5co-bg-section">
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-8 col-md-offset-2 text-center animate-box" data-animate-effect="fadeInUp">
                    <div class="fh5co-heading">
                        <span>We're expert</span>
                        <h2>What We Do</h2>
                        <p>JASI Will Deliver the Package Safely, Quickly And With the Best Quality We Have.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 " >
                    <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-news"></i>
						</span>
                        <h3>News About You & your Baby</h3>
                        <p>Find Information About Mom and Baby in JASI Website.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-command"></i>
						</span>
                        <h3>Fully Responsive</h3>
                        <p>You can access JASI Website Via Mobile Device. And Stay Tune On Play Store for Mobile Version.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <div class="feature-center animate-box" data-animate-effect="fadeInUp">
						<span class="icon">
							<i class="icon-power"></i>
						</span>
                        <h3>Web Starter</h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts.</p>
                        <p><a href="#">Learn more</a></p>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div id="fh5co-testimonial" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box row-pb-md">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>You deserved happiness</span>
                    <h2>Happy Clients</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 animate-box">
                    <div class="testimonial">
                        <blockquote>
                            <p>&ldquo;Pengiriman Cepat dan akurat Harga pun bersahabat dinkantong.&rdquo;</p>
                            <p class="author"> <img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite>&mdash; Mike Adam</cite></p>
                        </blockquote>
                    </div>

                    <div class="testimonial">
                        <blockquote>
                            <p>&ldquo;Pengiriman Cepat dan akurat Harga pun bersahabat dinkantong.&rdquo;</p>
                            <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite>&mdash; Eric Miller</cite></p>
                        </blockquote>
                    </div>
                </div>

                <div class="col-md-6 animate-box">
                    <div class="testimonial">
                        <blockquote>
                            <p>&ldquo;Pengiriman Cepat dan akurat Harga pun bersahabat dinkantong.&rdquo;</p>
                            <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite>&mdash; Eric Miller</cite></p>
                        </blockquote>
                    </div>

                    <div class="testimonial">
                        <blockquote>
                            <p>&ldquo;Pengiriman Cepat dan akurat Harga pun bersahabat dinkantong.&rdquo;</p>
                            <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite>&mdash; Mike Adam</cite></p>
                        </blockquote>
                    </div>

                </div>



            </div>
        </div>
    </div>

    <div id="fh5co-counter">
        <div class="container">

            <div class="row animate-box" data-animate-effect="fadeInUp">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Enjoy it</span>
                    <h2>Fun Facts</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident.
                        Odit ab aliquam dolor eius.</p>
                </div>
            </div>

            <div class="row">

                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="feature-center">
						<span class="icon">
							<i class="ti-download"></i>
						</span>
                        <span class="counter"><span class="js-counter" data-from="0" data-to="15" data-speed="1500"
                                                    data-refresh-interval="50">1</span>M+</span>
                        <span class="counter-label">Downloads</span>

                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="feature-center">
							<span class="icon">
								<i class="ti-face-smile"></i>
							</span>
                        <span class="counter"><span class="js-counter" data-from="0" data-to="{{App\User::all()->count()}}" data-speed="1500"
                                                    data-refresh-interval="50">1</span></span>
                        <span class="counter-label">Happy Clients</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="feature-center">
							<span class="icon">
								<i class="ti-briefcase"></i>
							</span>
                        <span class="counter"><span class=" js-counter" data-from="0" data-to="60" data-speed="1500"
                                                    data-refresh-interval="50">1</span></span>
                        <span class="counter-label">Courier</span>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
                    <div class="feature-center">
							<span class="icon">
								<i class="ti-time"></i>
							</span>
                        <span class="counter"><span class="js-counter" data-from="0" data-to="7" data-speed="1500"
                                                    data-refresh-interval="50">1</span>K+</span>
                        <span class="counter-label">Hours Spent</span>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="fh5co-blog" class="fh5co-bg-section">
        <div class="container">
            <div class="row animate-box row-pb-md" data-animate-effect="fadeInUp">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Thoughts &amp; Ideas</span>
                    <h2>Our Blog</h2>
                    <p>Temukan Informasi untuk Ibu dan sang buah hati</p>
                </div>
            </div>
            <div class="row">
                @foreach($blog as $post)
                    <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                        <div class="fh5co-post">
                            <span class="fh5co-date">{{$post->updated_at}}</span>
                            <h3><a href="#">{{$post->judul}}</a></h3>
                            <p>{!! $post->konten !!}</p>
                            <p class="author"><img src="{{asset('shape/images/person1.jpg')}}"
                                                   alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite> {{$post->uploder}}</cite></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="fh5co-started">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Let's Start Your Experience with JASI</span>
                    <h2>Start Your Journey with Us</h2>
                    <p><a href="{{route('register')}}">
                        <button type="submit" class="btn btn-default">Take your Experience</button></a>
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection