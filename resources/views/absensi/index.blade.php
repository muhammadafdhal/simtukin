@extends('template.app')

@section('kinerja')
active
@endsection

@section('content')
@if (count($detail)>0)
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
                            <h3 class="panel-title text-center">Kinerja Bulan {{$kinerja->kinerja_bulan}}
                                {{$kinerja->kinerja_tahun}}</h3>
                        </div>

                        <div class="panel-heading">
                            <a href="/kinerja" data-toggle="tooltip" title="Kembali" class="btn btn-danger"><i
                                    class="lnr lnr-arrow-left-circle"></i>
                            </a>
                            @if ($detail[0]->kinerja_status == "belum")

                            <a href="/kinerja/absensi/{{$kinerja->kinerja_id}}" class="btn btn-primary">Tambah</a>
                            
                            @endif
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nip/Nik</th>
                                        <th>Nama</th>
                                        {{-- <th>Izin</th> --}}
                                        <th>Sakit Dgn Surat</th>
                                        <th>Sakit Tanpa Surat</th>
                                        <th>Tidak Masuk</th>
                                        <th>Cuti Bersalin</th>
                                        <th>keterlambatan</th>
                                        <th>Hukuman Disiplin</th>
                                        @if ($detail[0]->kinerja_status == "belum")
                                        <th>Aksi</th>

                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $a)

                                    {{--  --}}

                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$a->nip_nik}}</td>
                                        <td>{{$a->name}}</td>

                                        {{-- <td>{{$a->detail_izin}}</td> --}}
                                        <td>{{$a->detail_sakit_dgn_surat}} hari</td>
                                        <td>{{$a->detail_sakit_tanpa_surat}} hari</td>
                                        <td>{{$a->tanpa_keterangan}} hari</td>
                                        <td>{{$a->detail_cuti_bersalin}} hari</td>
                                        <td>
                                            <?php $telat = 0; ?>
                                            @foreach ($terlambat as $t)
                                                <?php
                                                if($a->detail_id == $t->terlambat_detail_id){

                                                $telat++;
                                            }
                                                ?>
                                            @endforeach
                                            {{$telat}}
                                            
                                        </td>
                                        <td>{{$a->detail_hukuman_disiplin}}</td>
                                        @if ($a->kinerja_status == "belum")
                                        <td>
                                            <a href="/absensi/tunjangan/{{$a->detail_id}}" class="btn btn-primary"
                                                data-toggle="tooltip" title="Info Tunjangan">
                                                <i class="fa fa-info-circle"></i>
                                            </a>
                                            <br><br>
                                            <a href="/absensi/edit/{{$a->detail_id}}" class="btn btn-primary"
                                                data-toggle="tooltip" title="Edit">
                                                <i class="lnr lnr-pencil"></i>
                                            </a>
                                            <br><br>
                                            <form method="POST"
                                                onclick="return confirm('Yakin Ingin Menghapus Data Ini ?')"
                                                action="/absensi/delete/{{$a->detail_id}}">
                                                {{ csrf_field() }} {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-danger" data-toggle="tooltip"
                                                    title="Hapus"> <i class="lnr lnr-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                        @endif
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
</div>

<!-- END BASIC TABLE -->
@else
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
                            <h3 class="panel-title text-center">Absensi Bulan {{$kinerja->kinerja_bulan}}
                                {{$kinerja->kinerja_tahun}}</h3>
                        </div>

                        <div class="panel-heading">
                            <a href="/kinerja" data-toggle="tooltip" title="Kembali" class="btn btn-danger"><i
                                    class="lnr lnr-arrow-left-circle"></i>
                            </a>
                            <a href="/kinerja/absensi/{{$kinerja->kinerja_id}}" class="btn btn-primary">Tambah</a>
                        </div>
                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nip/Nik</th>
                                        <th>Nama</th>
                                        {{-- <th>Izin</th> --}}
                                        <th>Sakit Dgn Surat</th>
                                        <th>Sakit Tanpa Surat</th>
                                        <th>Tidak Masuk</th>
                                        <th>Cuti Bersalin</th>
                                        <th>keterlambatan</th>
                                        <th>Hukuman Disiplin</th>

                                        <th>Aksi</th>


                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
