@extends('template.app')
@section('user')
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
                            <h3 class="panel-title text-center">Data Pegawai
                            </h3>
                        </div>
                        {{-- <div class="panel-heading">
                            <a href="/user/tambah" class="btn btn-primary">Tambah</a>
                        </div> --}}
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nip/Nik</th>
                                        <th>Nama</th>
                                        <th>Pangkat</th>
                                        <th>Grade</th>
                                        {{-- <th>Aksi</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                $no = 1    
                                    ?>
                                    @foreach ($user as $a)

                                    @if ($a->id != Auth::user()->id)


                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$a->nip_nik}}</td>
                                        <td>{{$a->name}}</td>
                                        <td>{{$a->pangkat_nama}}</td>
                                        <td>Grade {{$a->grade_nama}}</td>
                                        {{-- <td>
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <a href="/user/edit/{{$a->id}}" class="btn btn-info"><i
                                                            class="lnr lnr-pencil"></i></a>

                                                </div>
                                                <div class="col-md-4">

                                                    <form method="POST"
                                                        onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                        action="/user/delete/{{$a->id}}">
                                                        {{ csrf_field() }} {{method_field('DELETE')}}
                                                        <button type="submit" class="btn btn-danger"> <i
                                                                class="lnr lnr-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>

                                    @endif
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
