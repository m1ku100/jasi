@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" data-background-color="purple">
                            <h4 class="title">Form Berita</h4>
                            <p class="category">Complete it</p>
                        </div>
                        <div class="card-content">
                            <form method="post" action="{{route('save')}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Judul</label>
                                            <input type="text" name="judul" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Sub Judul</label>
                                            <input type="text" name="subjudul" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="">
                                            <label class="control-label">Foto Cover</label>
                                            <input type="file" name="dir" class="" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">

                                            <label>Konten Berita</label>
                                            <div class="form-group">
                                                <textarea name="konten" class="form-control" rows="5" required> </textarea>
                                            </div>

                                    </div>
                                </div>
                                <input type="text" name="uploder" value="{{ Auth::user()->name }}" hidden="">
                                <button type="submit" class="btn btn-primary pull-right">Publish Berita</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
