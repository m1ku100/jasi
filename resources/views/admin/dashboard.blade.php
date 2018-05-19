@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="orange">
                            <i class="material-icons">content_copy</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Posting</p>
                            <h3 class="title">
                                {{$blog}}
                                <small>Post</small>
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="green">
                            <i class="material-icons">supervisor_account</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Users</p>
                            <h3 class="title">{{App\User::all()->count()}}
                                <small>User</small>
                            </h3>

                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="red">
                            <i class="material-icons">info_outline</i>
                        </div>
                        <div class="card-content">
                            <p class="category">Order Today</p>
                            <h3 class="title">{{App\Order::all()->where('created_at', '>=', today())->count()}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header" data-background-color="blue">
                            <i class="fa fa-comment"></i>
                        </div>
                        <div class="card-content">
                            <p class="category">Feedback (Today)</p>
                            <h3 class="title">{{$feedback}}</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">update</i> Just Updated
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title">Feedback Today</h4>
                            <p class="category">List Feedback yang masuk untuk hari ini</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>No</th>
                                <th>Nama Pengirim</th>
                                <th>Email Pengirim</th>
                                <th>Konten</th>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach(App\Feedback::all()->where('created_at','>=',today()) as $today)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$today->nama}}</td>
                                        <td>{{$today->email}}</td>
                                        <td>{{$today->konten}}</td>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Feedback</h4>
                            <p class="category">List Feedback keseluruhan</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-primary">
                                <th>No</th>
                                <th>Nama Pengirim</th>
                                <th>Email Pengirim</th>
                                <th>Konten</th>
                                </thead>
                                <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach(App\Feedback::all() as $today)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$today->nama}}</td>
                                        <td>{{$today->email}}</td>
                                        <td>{{$today->konten}}</td>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
