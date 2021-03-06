@extends('layouts.global')
@section('content')
    <header id="fh5co-header" class="fh5co-cover" role="banner" style="background-image:url(images/img_bg_1.jpg);">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-md-offset-0 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeInUp">
                            <h1 class="mb30">Set Your Profile</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-contact">

        <div class="container">
            <div class="row">
                <div class="col-md-6 animate-box">
                    <h3>Setting Bio</h3>
                    <form action="{{route('save.profile')}}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control" placeholder="Your firstname"
                                       value="{{ Auth::user()->name }}" name="name">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="email">Email</label>
                                <input type="text" id="email" class="form-control" value="{{ Auth::user()->email }}"
                                       placeholder="Your email address" name="email">
                                <input type="hidden" id="email" class="form-control" value="{{ Auth::user()->id }}"
                                       placeholder="Your email address" name="id">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Change" class="btn btn-primary">
                        </div>

                    </form>
                </div>
                <div class="col-md-6 animate-box">
                    <h3>Setting Password</h3>
                    <form action="{{route('save.pass')}}"
                          method="post">
                        {{ csrf_field() }}
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="fname">Old Password</label>
                                <input type="password" id="fname" class="form-control" placeholder="Your Old Password"
                                       name="passlama">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for="email">New Password</label>
                                <input type="password" id="email" class="form-control" placeholder="New Password"
                                       name="passbaru">
                                <input type="hidden" id="email" class="form-control" value="{{ Auth::user()->id }}"
                                       placeholder="Your email address" name="id">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Re-Type Password</label>
                                <input type="password" id="email" class="form-control"
                                       placeholder="Re-type New Password" name="pass_confirm">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Change" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <h3>Order History</h3>
                @foreach(App\Order::where('user_id','=', Auth::user()->id)->get() as $histor )
                    <div class="col-md-4 animate-box">
                        <div class="fh5co-contact-info">
                            <ul>
                                <li class="address"><b>Dari</b> , <br> {{$histor->pengambilan}}</li>
                                <li class="address"><b>Menuju</b> , <br> {{$histor->tujuan}}</li>
                                <li class="email">RP. {{$histor->harga}}   </li>
                                <li class="url">{{$histor->updated_at}}</li>
                            </ul>

                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>


@endsection
@push('js')
    <script>
        @if(Session::has('message'))
        swal({
            title: 'Berhasil !',
            icon: 'success',
            text: '{{ Session::get('message') }}'
        })
        @endif
        @if(Session::has('error'))
        swal({
            title: 'Ups !',
            icon: 'error',
            text: '{{ Session::get('error') }}'
        })
        @endif
    </script>
@endpush