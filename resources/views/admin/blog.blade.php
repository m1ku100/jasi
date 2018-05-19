@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-7">

                    <a href="{{route('blog.form')}}">
                    <button type="button" class="btn btn-info pull-left" >
                        <i class="material-icons">playlist_add
                        </i> Tambah Data Kategori
                    </button>
                    </a>
                </div>
            </div>

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
                                    <span class="nav-tabs-title">Post:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="active">
                                            <a href="#article" data-toggle="tab">
                                                <i class="material-icons">toc</i> Article
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="#research" data-toggle="tab">
                                                <i class="material-icons">find_in_page
                                                </i> Research
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
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Uploader</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $no = 1;
                                        ?>
                                        @foreach($blog as $post)
                                            <tr>
                                                <td>{{$no}}</td>
                                                <td>{{$post->judul}}</td>
                                                <td>{!! $post->konten !!}</td>
                                                <td>{{$post->uploder}}</td>
                                                <td>@if($post->is_public == true)
                                                        Public
                                                    @else
                                                        Privat
                                                    @endif
                                                </td>
                                                <td class="td-actions text-right">

                                                    @if($post->is_public == true)
                                                        <form action="{{route('hide')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" name="id" value="{{$post->id}}" hidden>
                                                            <input type="text" name="is_public" value="0" hidden>
                                                            <button type="submit" class="btn btn-danger">
                                                                Sembunyikan Artikel
                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{route('hide')}}" method="post">
                                                            {{csrf_field()}}
                                                            <input type="text" name="id" value="{{$post->id}}" hidden>
                                                            <input type="text" name="is_public" value="1" hidden>
                                                            <button type="submit" class="btn btn-success">
                                                                Tampilkan Artikel
                                                            </button>
                                                        </form>
                                                    @endif

                                                    <button type="button" rel="tooltip" title="Edit Post"
                                                            class="btn btn-primary btn-simple btn-xs"
                                                            data-target="#edit-{{$post->id}}"
                                                            data-toggle="modal">
                                                        <i class="material-icons">edit</i>
                                                    </button>
                                                    <form action="{{route('delete')}}" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id" value="{{ $post->id }}">
                                                        <button type="submit" rel="tooltip" title="Delete Post"
                                                                class="btn btn-danger btn-simple btn-xs"
                                                                @click.prevent="reset">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </form>

                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-7">
                                                            {{------ MODAL Edit -----}}
                                                            <div class="modal fade" id="edit-{{$post->id}}"
                                                                 tabindex="-1"
                                                                 role="dialog"
                                                                 aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="col-md-12">
                                                                        <div class="card card-profile">
                                                                            <div class="content">
                                                                                <h3 class="category text-gray"> Edit
                                                                                    Artikel </h3>

                                                                                <form action="{{route('update.blog')}}"
                                                                                      method="post">
                                                                                    {{ csrf_field() }}
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group label-floating">
                                                                                            <label class="control-label">Judul
                                                                                                Artikel</label>
                                                                                            <input type="hidden"
                                                                                                   name="id"
                                                                                                   value="{{ $post->id }}">
                                                                                            <input type="text"
                                                                                                   name="judul"
                                                                                                   class="form-control"
                                                                                                   value="{{$post->judul}}"
                                                                                                   required>
                                                                                        </div>

                                                                                        <div class="form-group label-floating">
                                                                                            <label class="control-label">Judul
                                                                                                Artikel</label>
                                                                                            <input type="text"
                                                                                                   name="subjudul"
                                                                                                   class="form-control"
                                                                                                   value="{{$post->subjudul}}"
                                                                                                   required>
                                                                                        </div>

                                                                                        <div class="form-group label-floating">
                                                                                            <label>Konten Berita</label>
                                                                                            <div class="form-group">
                                                                                                <textarea name="konten"
                                                                                                          class="form-control"
                                                                                                          rows="5"
                                                                                                          required> {!! $post->konten !!} </textarea>
                                                                                            </div>
                                                                                        </div>

                                                                                        <button href="#pablo"
                                                                                                type="submit"
                                                                                                class="btn btn-primary btn-round">
                                                                                            Perbarui
                                                                                            Data
                                                                                        </button>
                                                                                    </div>
                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

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
                                        <th>Judul</th>
                                        <th>Konten</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="orange">
                            <h4 class="title"><b>Daftar Kategori</b></h4>
                            <p class="category">Daftar Kategori yang Tersedia</p>
                        </div>
                        <div class="card-content table-responsive">
                            <table class="table table-hover">
                                <thead class="text-warning">
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                                </thead>
                                <tbody>

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
