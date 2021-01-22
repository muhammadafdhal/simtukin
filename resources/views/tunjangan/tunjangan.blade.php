@extends('template.app')

@section('tunjangan')
active
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <!-- BASIC TABLE -->
                <div class="panel">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Tunjangan Kinerja
                            </h3>
                        </div>
                        <div class="panel-heading">
                            {{-- <a href="/tunjangan_kinerja" data-toggle="tooltip" title="Kembali" class="btn btn-danger"><i
                                    class="lnr lnr-arrow-left-circle"></i>
                            </a>
                            <a href="/tunjangan/cetak/{{$kinerja->kinerja_id}}" data-toggle="tooltip" title="Cetak"
                                class="btn btn-primary"><i class="lnr lnr-printer"></i>
                            </a> --}}
                        </div>

                        <div class="panel-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        {{-- <th>Nip/Nik</th> --}}
                                        {{-- <th>Nama</th> --}}
                                        <th>Bulan</th>
                                        {{-- <th>Izin</th> --}}
                                        <th>Sakit Dgn Surat</th>
                                        <th>Sakit Tanpa Surat</th>
                                        <th>Tanpa Keterangan</th>
                                        <th>Cuti Bersalin</th>
                                        <th>keterlambatan</th>
                                        <th>Hukuman Disiplin</th>
                                        <th>Total Tunjangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($detail as $a)

                                    <?php 
                                    $con = 0;
                                    foreach ($terlambat as $s ) {
                                        
                                        if ($a->detail_id == $s->terlambat_detail_id) {
                                            $t = $s->terlambat_waktu;                                       
                                            if($t == "terlambat 1")
                                            {
                                                $t = 0.5/100*$a->grade_nominal;
                                            }
                                            elseif($t == "terlambat 2")
                                            {
                                                $t = 1/100*$a->grade_nominal;
                                            }
                                            elseif($t == "terlambat 3")
                                            {
                                                $t = 1.25/100*$a->grade_nominal;
                                            }
                                            elseif($t == "terlambat 4")
                                            {
                                                $t = 1.5/100*$a->grade_nominal;
                                            }
                                        }
                                    }
                                            $con = $con + $t;
                                            
                                            // $nominal4 = count($t);
                                            // $rupiah4 = "Rp " . number_format($nominal4,2,',','.');
                                        
                                            $nominal4 = $con;
                                            $rupiah4 = "Rp. " . number_format($nominal4,2,',','.');
                                            // echo $rupiah4;

                                
                                    ?>

                                    <tr>
                                        <td>{{$loop->iteration}}.</td>
                                        {{-- <td>{{$a->nip_nik}}</td> --}}
                                        {{-- <td>{{$a->name}}</td> --}}
                                        <td>{{$a->kinerja_bulan}}</td>
                                        {{-- <td>{{$a->detail_izin}}</td> --}}
                                        <td>
                                            <?php 
                                    if ($a->detail_sakit_dgn_surat)
                                    {
                                        $persen = 2/100*$a->grade_nominal;
                                        $a->detail_sakit_dgn_surat *= $persen;

                                        $nominal = $a->detail_sakit_dgn_surat;
                                        $rupiah = "Rp. " . number_format($nominal,2,',','.');
                                        if ($rupiah >= 0 ) {
                                            echo $rupiah;
                                        }
                                        else echo 0;
                                    }
                                    
                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                    if ($a->detail_sakit_tanpa_surat || $a->tanpa_keterangan)
                                    {
                                        $persen1 = 5/100*$a->grade_nominal;
                                        $a->detail_sakit_tanpa_surat *= $persen1;
                                        $a->tanpa_keterangan *= $persen1;

                                        $nominal1 = $a->detail_sakit_tanpa_surat;
                                        $rupiah1 = "Rp. " . number_format($nominal1,2,',','.');
                                        if ($rupiah1 >= 0 ) {
                                            echo $rupiah1;
                                        }
                                        else echo 0;
                                    }
                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                    $nominal2 = $a->tanpa_keterangan;
                                    $rupiah2 = "Rp. ". number_format($nominal2,2,',','.');
                                    if ($rupiah2 >= 0 ) {
                                            echo $rupiah2;
                                        }
                                        else echo 0;
                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($a->detail_cuti_bersalin != 0)
                                            {
                                                $persen2 = 1.5/100*$a->grade_nominal;
                                                $a->detail_cuti_bersalin *= $persen2;

                                                $nominal3 = $a->detail_cuti_bersalin;
                                                $rupiah3 = "Rp. " . number_format($nominal3,2,',','.');
                                                    echo $rupiah3;
                                            }
                                            else {
                                                echo 0;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                                {{$rupiah4}}
                                        </td>
                                        <td>
                                            <?php
                                    if ($a->detail_hukuman_disiplin == "Iya")
                                    {
                                        $persen3 = 15/100*$a->grade_nominal;
                                        // $tambah = $persen*3;
                                        
                                        $nominal5 = $persen3;
                                        $rupiah5 = "Rp. " . number_format($nominal5,2,',','.');

                                            echo $rupiah5;
                                    }
                                    elseif($a->detail_hukuman_disiplin == "Tidak")
                                        echo 0;
                                    ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($a->detail_hukuman_disiplin == "Iya")
                                            {
                                                $kurang = $a->detail_sakit_dgn_surat+$a->detail_sakit_tanpa_surat+$a->tanpa_keterangan+$a->detail_cuti_bersalin+$nominal5+$con;

                                                $total= $a->grade_nominal-$kurang;
                                                $rupiah6 = "Rp. " . number_format($total,2,',','.');

                                                echo $rupiah6;
                                            }
                                            elseif($a->detail_hukuman_disiplin == "Tidak")
                                            {
                                                $kurang = $a->detail_sakit_dgn_surat+$a->detail_sakit_tanpa_surat+$a->tanpa_keterangan+$a->detail_cuti_bersalin+$con;

                                                $total= $a->grade_nominal-$kurang;
                                                $rupiah6 = "Rp. " . number_format($total,2,',','.');

                                                echo $rupiah6;
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/tunjangan_pegawai/detail/{{$a->detail_id}}" data-toggle="tooltip" title="Cetak"
                                                class="btn btn-primary"><i class="fa fa-info-circle"></i>
                                            </a>
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
