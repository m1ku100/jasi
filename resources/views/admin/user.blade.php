@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-profile">
                        <div class="content">
                            <h6 class="category text-gray"> User </h6>
                            <h3 class="card-title"> {{ Auth::user()->name }}</h3>
                            <p class="card-content">
                                {{ Auth::user()->email }}
                            </p>
                            <button type="button" class="btn btn-primary" data-target="#tambah" data-toggle="modal">Edit
                                Profile
                            </button>
                        </div>
                    </div>
                </div>

                {{----------- MODAL FORM ----------------}}
                <div class="modal fade" id="tambah" tabindex="-1" role="dialog"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="col-md-12">
                            <div class="card card-profile">
                                <div class="content">
                                    <h3 class="category text-gray"> Form Sunting Profil </h3>

                                    <form action="{{route('save.user')}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Username</label>
                                                        <input type="text" name="name" value="{{ Auth::user()->name }}"
                                                               class="form-control" required>
                                                        <input type="text" name="id" value="{{ Auth::user()->id }}" hidden="">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Password Lama</label>
                                                        <input type="password" name="passlama" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Password Baru</label>
                                                        <input type="password" name="passbaru"
                                                               class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Konfirmasi Password</label>
                                                        <input type="password" name="pass_confirm" class="form-control"
                                                               required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <button href="#pablo" type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{----------------------------------------}}
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Tambah User</h4>
                        </div>
                        <div class="card-content">
                            <form method="post" action="{{route('add.user')}}">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email</label>
                                            <input type="email" name="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right">Tambah User</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">User List</h4>
                            <p class="category">Tabel Daftar User</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table">
                                <thead class="text-primary">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Hak Akses</th>
                                </thead>
                                <tbody>
                                @foreach($pengguna as $user)
                                    <?php
                                    $no = 1;
                                    ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td class="text-primary">{{$user->role}}</td>
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
    </div>
@endsection
@push('js')
    <script>
        @if(Session::has('success'))
        swal({
            title: 'Berhasil !',
            icon: 'success',
            text: '{{ Session::get('success') }}'
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
