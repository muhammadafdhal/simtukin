@extends('template.app')

@section('tunjangan')
active
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">
        {{-- <h3 class="page-title">Tables</h3> --}}
        <div class="row">
            <div class="col-md-12">
                <!-- BASIC TABLE -->
                <div class="panel">
                    {{-- <div class="panel-heading">
                        <a href="/kinerja/tambah" class="btn btn-primary">Tambah</a>
                    </div> --}}
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Laporan Kinerja
                            </h3>
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

                                        <div class="row">
                                            <div class="col-md-2">
                                                @if (Auth::user()->level == "Admin")
                                                <a href="/tunjangan/detail/{{$a->kinerja_id}}" class="btn btn-info"
                                                    data-toggle="tooltip" title="Detail">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                                @elseif(Auth::user()->level == "Pegawai")
                                                <a href="/tunjangan/pegawai/{{$a->kinerja_id}}" class="btn btn-info"
                                                    data-toggle="tooltip" title="Detail">
                                                    <i class="fa fa-info-circle"></i>
                                                </a>
                                                @endif

                                                

                                            </div>

                                            {{-- <div class="col-md-2">

                                                <a href="/kinerja/edit/{{$a->kinerja_id}}" class="btn btn-primary"
                                                    data-toggle="tooltip" title="Edit"><i
                                                        class="lnr lnr-pencil"></i></a>

                                            </div>
                                            <div class="col-md-2">

                                                <form method="POST"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                    action="/kinerja/delete/{{$a->kinerja_id}}">
                                                    {{ csrf_field() }} {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus"> <i class="lnr lnr-trash"></i>
                                                    </button>
                                                </form>
                                            </div> --}}
                                        </div>
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
