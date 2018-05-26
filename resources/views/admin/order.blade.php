@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            {{--<div class="row">--}}
                {{--<div class="col-lg-8 col-md-7">--}}

                    {{--<a href="{{route('blog.form')}}">--}}
                        {{--<button type="button" class="btn btn-info pull-left">--}}
                            {{--<i class="material-icons">playlist_add--}}
                            {{--</i> Tambah Data Kategori--}}
                        {{--</button>--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="row">
                <div class="col-lg-8 col-md-7">
                    {{------ MODAL KATEGORI -----}}
                    <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="col-md-12">
                                <div class="card card-profile">
                                    <div class="content">
                                        <h3 class="category text-gray"> Form Tambah kategori </h3>

                                        <form action="" method="post">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Nama Katefori</label>
                                                    <input type="text" name="nama" class="form-control" required>
                                                </div>
                                                <button href="#pablo" type="submit" class="btn btn-primary btn-round">
                                                    Tambah
                                                    Data
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{----- END Modal Kategori -----}}


                    <div class="card card-nav-tabs">
                        <div class="card-header" data-background-color="orange">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Order :</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#article" data-toggle="tab">
                                                <i class="material-icons">directions_run</i> On Progress
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#research" data-toggle="tab">
                                                <i class="material-icons">beenhere
                                                </i> Finish Order Today
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#finish" data-toggle="tab">
                                                <i class="material-icons">shopping_cart
                                                </i> Finish Order in Total
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="tab-content">
                                <div class="tab-pane active" id="article">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Start From</th>
                                        <th>Destination</th>
                                        <th>Distance</th>
                                        <th>Price</th>
                                        <th>action</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach($onprogress as $un)
                                            <tr>
                                                <td>{{$no}}</td>
                                                @if($un->count() > 0)
                                                    <td>{{App\User::find($un->user_id)->name}}</td>
                                                @else
                                                @endif
                                                <td>{{$un->pengambilan}}</td>
                                                <td>{{$un->tujuan}}</td>
                                                <td>{{$un->jarak}}</td>
                                                <td>Rp. {{$un->harga}}</td>
                                                <td>
                                                    <form action="{{route('active.order')}}" method="post">
                                                        {{csrf_field()}}
                                                        <input type="text" name="id" value="{{$un->id}}" hidden>
                                                        <input type="text" name="is_nyampek" value="1" hidden>
                                                        <button type="submit" class="btn btn-success">
                                                            Tandai Sudah Terkirim
                                                        </button>
                                                    </form>
                                                </td>

                                                <?php
                                                $no++;
                                                ?>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="research">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Start From</th>
                                        <th>Destination</th>
                                        <th>Distance</th>
                                        <th>Price</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach($finish as $unf)
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{App\User::find($unf->user_id)->name}}</td>
                                                <td>{{$unf->pengambilan}}</td>
                                                <td>{{$unf->tujuan}}</td>
                                                <td>{{$unf->jarak}}</td>
                                                <td>Rp. {{$unf->harga}}</td>

                                                <?php
                                                $no++;
                                                ?>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="finish">
                                    <table class="table table-hover">
                                        <thead class="text-warning">
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Start From</th>
                                        <th>Destination</th>
                                        <th>Distance</th>
                                        <th>Price</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach($finished as $unf)
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{App\User::find($unf->user_id)->name}}</td>
                                                <td>{{$unf->pengambilan}}</td>
                                                <td>{{$unf->tujuan}}</td>
                                                <td>{{$unf->jarak}}</td>
                                                <td>Rp. {{$unf->harga}}</td>

                                                <?php
                                                $no++;
                                                ?>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title"><b> Total Keuntungan</b></h4>
                            <p class="category">Jumlah Keuntungan Pada hari ini</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>No</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Price</th>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                ?>
                                <tr>
                                @foreach($order as $or)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{App\User::find($or->user_id)->name}}</td>
                                        <td>{{$or->updated_at}}</td>
                                        <td>Rp. {{$or->harga}}</td>

                                        <?php
                                        $no++;
                                        ?>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th colspan="3"><center>Jumlah</center> </th>
                                    <th>Rp. {{$provit}}</th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
@push('js')
    @if(session()->has('message'))
        <script>
            swal({
                title: "Berhasil !",
                icon: "success",
                text: "{{ session()->get('message') }}"
            });

        </script>
    @elseif(session()->has('error'))
        <script>
            swal({
                title: 'Ups !',
                icon: 'error',
                text: "{{ session()->get('error') }}"
            });

        </script>
    @endif

@endpush
