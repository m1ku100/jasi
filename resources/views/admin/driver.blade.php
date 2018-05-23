@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
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
                                                        <input type="text" name="id" value="{{ Auth::user()->id }}"
                                                               hidden="">
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Tambah User</h4>
                        </div>
                        <div class="card-content">
                            <form method="post" action="{{route('add.driver')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Username</label>
                                            <input type="text" name="nama" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group label-floating">
                                            <label class="control-label">alamat</label>
                                            <input type="text" name="alamat" class="form-control">
                                            <input type="hidden" name="role" value="driver" class="form-control"
                                                   hidden="">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">tgl_lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Foto Driver</label>
                                            <input type="file" name="dir" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Kendaraan</label>
                                            <input type="text" name="kendaraan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nomor Polisi</label>
                                            <input type="text" name="nopol" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group label-floating">
                                            <label class="control-label">no_telp</label>
                                            <input type="text" name="no_telp" class="form-control">
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
                                <th>Hak Akses</th>
                                <th>Info</th>
                                </thead>
                                <tbody>
                                @foreach($pengguna as $user)
                                    <?php
                                    $no = 1;
                                    ?>
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$user->nama}}</td>
                                        <td class="text-primary">Driver</td>
                                        <td >
                                            <button type="button" rel="tooltip" title="Data Driver"
                                                    class="btn btn-primary"
                                                    data-target="#edit-{{$user->id}}"
                                                    data-toggle="modal">
                                                Info
                                            </button>
                                        </td>
                                        <?php
                                        $no++;
                                        ?>
                                    </tr>

                                    <div class="row">
                                        <div class="col-lg-10 col-md-10">
                                            {{------ MODAL Edit -----}}
                                            <div class="modal fade" id="edit-{{$user->id}}"
                                                 tabindex="-1"
                                                 role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="container-fluid">
                                                        <div class="col-md-12">
                                                            <div class="card card-profile">
                                                                <div class="card-avatar">
                                                                    <a href="#pablo">
                                                                        <img class="img" src="{{asset('storage/'.$user->dir)}}" />
                                                                    </a>
                                                                </div>
                                                                <div class="content">
                                                                    <h6 class="category text-gray">{{$user->nama}}</h6>
                                                                    <h4 class="card-title">Data Pribadi</h4>
                                                                    <p><span class="contact-info">Address : <em>{{$user->alamat}}</em></span><br>
                                                                        <span class="contact-info">Phone : <em>{{$user->no_telp}}</em></span><br>
                                                                        <span class="contact-info">Email : <a href="#"><em>{{$user->tgl_lahir}}</em></a></span>
                                                                    </p>
                                                                    <br>
                                                                    <h4 class="card-title">Kendaraan</h4>
                                                                    <p><span class="contact-info">Address : <em>{{$user->kendaraan}}</em></span><br>
                                                                        <span class="contact-info">Phone : <em>{{$user->nopol}}</em></span><br>

                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
