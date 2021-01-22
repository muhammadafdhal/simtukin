@extends('template.app')

@section('kinerja')
active
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">
        {{-- <h3 class="page-title">Tables</h3> --}}
        <div class="row">
            <div class="col-md-12">
                <!-- BASIC TABLE -->
                @if(session('sukses'))
                <div class="alert alert-success alert-dismissible show" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('sukses')}}
                </div>
                @elseif(session('gagal'))
                <div class="alert alert-danger alert-dismissible show" role="alert">
                    <button class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                    {{ session('gagal')}}
                </div>
                @endif
                <div class="panel">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Tabel Data Kinerja</h3>
                        </div>
                        <div class="panel-heading">
                            <a href="/kinerja/tambah" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Tahun</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kinerja as $a)
                                    <tr>
                                        <td>{{$loop->iteration}}.</td>
                                        <td>{{$a->kinerja_bulan}}</td>
                                        <td>{{$a->kinerja_tahun}}</td>
                                        <td>

                                            @if ($a->kinerja_status == "belum")
                                            <div class="row">
                                                <div class="col-md-2">

                                                    <a href="/kinerja/detail/{{$a->kinerja_id}}" class="btn btn-info"
                                                        data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>

                                                </div>

                                                <div class="col-md-2">

                                                    <a href="/kinerja/edit/{{$a->kinerja_id}}" class="btn btn-primary"
                                                        data-toggle="tooltip" title="Edit">
                                                        <i class="lnr lnr-pencil"></i>
                                                    </a>

                                                </div>
                                                <div class="col-md-2">

                                                    <a href="/kinerja/status/{{$a->kinerja_id}}" class="btn btn-primary"
                                                        data-toggle="tooltip" title="Selesai">
                                                        <i class="lnr lnr-checkmark-circle"></i>
                                                    </a>

                                                    {{-- <form method="POST"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                        action="/kinerja/delete/{{$a->kinerja_id}}">
                                                    {{ csrf_field() }} {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus"> <i class="lnr lnr-trash"></i>
                                                    </button>
                                                    </form> --}}
                                                </div>
                                            </div>
                                            @else
                                            <div class="row">
                                                <div class="col-md-2">

                                                    <a href="/kinerja/detail/{{$a->kinerja_id}}" class="btn btn-info"
                                                        data-toggle="tooltip" title="Detail">
                                                        <i class="fa fa-info-circle"></i>
                                                    </a>

                                                </div>

                                                <div class="col-md-2">

                                                    {{-- <a href="/kinerja/edit/{{$a->kinerja_id}}" class="btn btn-primary"
                                                        data-toggle="tooltip" title="Selesai">
                                                        <i class="lnr lnr-checkmark-circle"></i>
                                                    </a> --}}

                                                    <form method="POST"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                    action="/kinerja/delete/{{$a->kinerja_id}}">
                                                    {{ csrf_field() }} {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus"> <i class="lnr lnr-trash"></i>
                                                    </button>
                                                    </form>
                                                </div>
                                            </div>

                                            @endif
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END BASIC TABLE -->
                </div>
            </div>
        </div>
    </div>
    @endsection
