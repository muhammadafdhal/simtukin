@extends('template.app')

@section('kinerja')
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
                            <h3 class="panel-title text-center">Kinerja Bulan {{$kinerja->kinerja_bulan}}
                                {{$kinerja->kinerja_tahun}}</h3>
                        </div>

                        <div class="panel-heading">
                        <a href="/tunjangan_pegawai" data-toggle="tooltip" title="Kembali" class="btn btn-danger"><i
                                    class="lnr lnr-arrow-left-circle"></i>
                            </a>
                            {{-- @if ($detail[0]->kinerja_status == "belum")

                            <a href="/kinerja/absensi/{{$kinerja->kinerja_id}}" class="btn btn-primary">Tambah</a>

                            @endif --}}
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nip/Nik</th>
                                        <td>{{$kinerja->nip_nik}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama</th>
                                        <td>{{$kinerja->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Sakit Dgn Surat (Pemotongan 2%/hari)</th>
                                        <td>{{$kinerja->detail_sakit_dgn_surat}} hari
                                            <br>
                                            Jumlah Potongan :

                                            <?php 
                                        if ($kinerja->detail_sakit_dgn_surat)
                                        {
                                            $persen = 2/100*$kinerja->grade_nominal;
                                            $kinerja->detail_sakit_dgn_surat *= $persen;
    
                                            $nominal = $kinerja->detail_sakit_dgn_surat;
                                            $rupiah = "Rp. " . number_format($nominal,2,',','.');
                                            if ($rupiah >= 0 ) {
                                                echo $rupiah;
                                            }
                                            else echo 0;
                                        }
                                        
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Sakit Tanpa Surat (Pemotongan 5%/hari)</th>
                                        <td>{{$kinerja->detail_sakit_tanpa_surat}} hari
                                            <br>
                                            Jumlah Potongan :
                                            <?php
                                            if ($kinerja->detail_sakit_tanpa_surat)
                                            {
                                                $persen1 = 5/100*$kinerja->grade_nominal;
                                                $kinerja->detail_sakit_tanpa_surat *= $persen1;
                                                $nominal1 = $kinerja->detail_sakit_tanpa_surat;
                                                $rupiah1 = "Rp. " . number_format($nominal1,2,',','.');
                                                if ($rupiah1 >= 0 ) {
                                                    echo $rupiah1;
                                                }
                                                else echo 0;
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Tidak Masuk</th>
                                        <td>{{$kinerja->tanpa_keterangan}} hari
                                            <br>
                                            Jumlah Potongan: 
                                            <?php
                                            $persen1 = 5/100*$kinerja->grade_nominal;
                                            $kinerja->tanpa_keterangan *= $persen1;
                                            $nominal2 = $kinerja->tanpa_keterangan;
                                            $rupiah2 = "Rp. ". number_format($nominal2,2,',','.');
                                            if ($rupiah2 >= 0 ) {
                                                    echo $rupiah2;
                                                }
                                                else echo 0;
                                            ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Cuti Bersalin</th>
                                        <td>{{$kinerja->detail_cuti_bersalin}} hari
                                        <br>
                                        Jumlah Potongan :
                                        <?php
                                        if ($kinerja->detail_cuti_bersalin)
                                        {
                                            $persen2 = 1.5/100*$kinerja->grade_nominal;
                                            $kinerja->detail_cuti_bersalin *= $persen2;

                                            $nominal3 = $kinerja->detail_cuti_bersalin;
                                            $rupiah3 = "Rp. " . number_format($nominal3,2,',','.');
                                            if ($rupiah3 >= 0 ) {
                                                echo $rupiah3;
                                            }
                                            else echo 0;
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>keterlambatan
                                            <br>
                                            - Terlambat: 1-30 menit : 0,5%
                                            <br>
                                            - Terlambat: 31-60 menit : 1%
                                            <br>
                                            - Terlambat: 61-90 menit : 1,25%
                                            <br>
                                            - Terlambat: >91 menit : 1,5%
                                        </th>
                                        <td>
                                            @foreach ($terlambat as $t)
                                            <?php
                                            if($t->terlambat_waktu == "terlambat 1")
                                            {
                                                echo "- 1 - 30 Menit";
                                            }
                                            elseif($t->terlambat_waktu == "terlambat 2")
                                            {
                                                echo "- 31 - 60 Menit";
                                            }
                                            elseif($t->terlambat_waktu == "terlambat 3")
                                            {
                                                echo "- 61 - 90 Menit";
                                            }
                                            elseif($t->terlambat_waktu == "terlambat 4")
                                            {
                                                echo "- 91 Menit";
                                            }
                                            ?>
                                            {{-- {{$t->terlambat_waktu}} --}}
                                            <br>
                                            @endforeach
                                            Total Potongan :
                                            <?php 
                                            $con = 0;
                                            foreach ($terlambat as $s ) {
                                                
                                                $t = $s->terlambat_waktu;
                                                
                                                    if($t == "terlambat 1")
                                                    {
                                                        $t = 0.5/100*$kinerja->grade_nominal;
                                                    }
                                                    elseif($t == "terlambat 2")
                                                    {
                                                        $t = 1/100*$kinerja->grade_nominal;
                                                    }
                                                    elseif($t == "terlambat 3")
                                                    {
                                                        $t = 1.25/100*$kinerja->grade_nominal;
                                                    }
                                                    elseif($t == "terlambat 4")
                                                    {
                                                        $t = 1.5/100*$kinerja->grade_nominal;
                                                    }
                                                }
                                                    $con = $con + $t;
                                                    
                                                    // $nominal4 = count($t);
                                                    // $rupiah4 = "Rp " . number_format($nominal4,2,',','.');
                                                
                                                    $nominal4 = $con;
                                                    $rupiah4 = "Rp. " . number_format($nominal4,2,',','.');
                                                    echo $rupiah4;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Hukuman Disiplin</th>
                                        <td>{{$kinerja->detail_hukuman_disiplin}}
                                        <br>
                                        Jumlah Potongan :
                                        <?php
                                        if ($kinerja->detail_hukuman_disiplin == "Iya")
                                        {
                                            $persen3 = 15/100*$kinerja->grade_nominal;
                                            // $tambah = $persen*3;
                                            
                                            $nominal5 = $persen3;
                                            $rupiah5 = "Rp. " . number_format($nominal5,2,',','.');

                                                echo $rupiah5;
                                        }
                                        elseif($kinerja->detail_hukuman_disiplin == "Tidak")
                                            echo 0;
                                        ?>
                                        </td>
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

<!-- END BASIC TABLE -->
@endsection
