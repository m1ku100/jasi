@extends('layouts.global')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">Contact Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-contact">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-md-push-1 animate-box">

                    <div class="fh5co-contact-info">
                        <h3>Contact Information</h3>
                        <ul>
                            <li class="address">Jalan Ketintang, <br> Universitas Negeri Surabaya</li>
                            <li class="phone"><a href="tel://1234567920">+62 xxx xxxx xxxx</a></li>
                            <li class="email"><a href="mailto:info@yoursite.com">jasi@service.com</a></li>
                            <li class="url"><a href="http://gettemplates.co">jasi.co.id</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-md-6 animate-box">
                    <h3>Contact Us</h3>
                    <form action="{{route('send.feedback')}}"
                    method="post">
                    {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" placeholder="Your firstname" name="nama">
                            </div>

                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" placeholder="Your email address" name="email">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="subject">Subject</label>
                                <input type="text" id="subject" class="form-control" placeholder="Your subject of this message" name="subject">
                            </div>
                        </div>
                        <input class="form-field" name="isread" id="email" value="1" type="text" placeholder="Email"
                               required hidden="">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="message">Message</label>
                                <textarea name="konten" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" ></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message" class="btn btn-primary">
                        </div>

                    </form>
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

    <div id="fh5co-started">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Let's work together</span>
                    <h2>Start Your Project</h2>
                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
                    <p><button type="submit" class="btn btn-default">Get In Touch</button></p>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('js')
    @if(session()->has('message'))
        <script>
            swal({
                title: "Terima Kasih !",
                icon: "success",
                text: "{{ session()->get('message') }}"
            });

        </script>
    @endif
@endpush