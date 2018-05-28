@extends('layouts.global')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">Our Service</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @guest
        <div id="fh5co-blog" class="fh5co-bg-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-md-offset-0 text-center">
                        <div class="display-t">
                            <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                                <a href="{{ route('login') }}">
                                    <button class="btn btn-danger">Anda Harus Login untuk Menggunakan Fasilitas Ini
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div id="fh5co-blog" class="fh5co-bg-section">
            <div class="map">
                <div id="map"></div>
                @if(App\Order::all()->where('user_id','=',Auth::user()->id)->where('is_nyampek',false)->count()>0)
                    <div class="map-c">
                        <h1>
                           Jasa Antar ASI
                        </h1><br>
                    @foreach(App\Order::orderBy('id','desc')->where('user_id','=',Auth::user()->id)->limit(1)->get() as $order)
                            <h3> @guest

                                @else
                                    {{ Auth::user()->name }}
                                @endguest</h3>
                            <div class="det"><i class="fa fa-map-marker"></i>Pengambilan :<h4>{{$order->pengambilan}}</h4></div>
                            <div class="det"><i class="fa fa-phone"></i> Tujuan :<h4>{{$order->tujuan}}</h4></div>
                            <div class="det"><i class="fa fa-globe"></i> Jarak tempuh : <h4>{{$order->jarak}}</h4>
                                Harga : <h4>Rp. {{$order->harga}}</h4></div>
                            <center>
                                <button class="fa ">Directions</button>
                                <button class="fa ">Pesan</button>
                            </center>
                       @endforeach
                    </div>

                @else
                    <div id="right-panel">
                        <div>
                            <b>Start:</b>
                            <input id="start" class="form-control" placeholder="Posisi Anda Saat Ini">
                            <br>
                            <select multiple id="waypoints" hidden="">
                                <option value="Jl. Ketintang">Montreal, QBC</option>
                            </select>
                            <br>
                            <b>End:</b>
                            <input id="end" class="form-control" placeholder="Tujuan Anda">
                            <br>
                            <input type="submit" id="submit" class="btn btn-primary">
                        </div>
                        <form method="post" action="{{route('order.save')}}">{{ csrf_field() }}
                            <div id="directions-panel"></div>
                            <input type="hidden" class="form-control" name="user_id"
                                   value="@guest @else{{ Auth::user()->id }}@endguest">
                            <button type="submit" class="btn btn-success"> Pesan</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endguest
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