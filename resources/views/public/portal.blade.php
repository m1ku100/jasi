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
        <div class="container">
            <div class="row animate-box row-pb-md" data-animate-effect="fadeInUp">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Thoughts &amp; Ideas</span>
                    <h2>Our Blog</h2>
                    <p>Dapakan informasi seputar KEsehatan Bayi dan Ibu menyusui pada halaman ini.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="fh5co-post">
                        <span class="fh5co-date">Sep. 12th</span>
                        <h3><a href="#">Menu sehat untuk ASI sang Bayi</a></h3>
                        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite> Mike Adam</cite></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="fh5co-post">
                        <span class="fh5co-date">Sep. 23rd</span>
                        <h3><a href="#">Kesehatan ASI itu penting loh bunda</a></h3>
                        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite> Mike Adam</cite></p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 animate-box" data-animate-effect="fadeInUp">
                    <div class="fh5co-post">
                        <span class="fh5co-date">Sep. 24th</span>
                        <h3><a href="#">Waspadai Makanan yang Anda makan </a></h3>
                        <p>Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
                        <p class="author"><img src="{{asset('shape/images/person1.jpg')}}" alt="Free HTML5 Bootstrap Template by FreeHTML5.co"> <cite> Mike Adam</cite></p>
                    </div>
                </div>

                <div class="col-md-12 text-center">
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <li>
                                <a href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li>
                                <a href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

@endsection