@extends('template.app')

@section('grade')
active
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">
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
                @endif
                <div class="panel">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Tabel Data Grade</h3>
                        </div>
                    <div class="panel-heading">
                        <a href="/grade/tambah" class="btn btn-primary">Tambah</a>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Nominal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grade as $a)

                                <?php

                                 //currecny rupiah
                                $nominal = $a->grade_nominal;
                                $rupiah = "Rp " . number_format($nominal,2,',','.');

                                ?>

                                <tr>
                                    <td>{{$loop->iteration}}.</td>
                                    <td>Grade {{$a->grade_nama}}</td>
                                    <td>{{$rupiah}}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-2">

                                                <a href="/grade/edit/{{$a->grade_id}}" class="btn btn-info"
                                                    data-toggle="tooltip" title="Edit"><i
                                                        class="lnr lnr-pencil"></i></a>

                                            </div>
                                            <div class="col-md-2">

                                                <form method="POST"
                                                    onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                    action="/grade/delete/{{$a->grade_id}}">
                                                    {{ csrf_field() }} {{method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                        title="Hapus"> <i class="lnr lnr-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
