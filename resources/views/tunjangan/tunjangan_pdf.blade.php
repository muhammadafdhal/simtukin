<!DOCTYPE html>
<html>

<head>
    <title>Laporan Tunjangan Kinerja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>
    <center>
        <h5>Laporan Tunjangan Kinerja {{$kinerja->kinerja_bulan}} {{$kinerja->kinerja_tahun}}
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                {{-- <th>NIP/NIK</th> --}}
                <th>Sakit Dgn Surat</th>
                <th>Sakit Tanpa Surat</th>
                <th>Tanpa Keterangan</th>
                <th>Cuti Bersalin</th>
                <th>Keterlambatan</th>
                <th>Hukuman Disiplin</th>
                <th>Total Tunjangan</th>
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
                <td>{{$loop->iteration}}</td>
                {{-- <td>{{$a->nip_nik}}</td> --}}
                <td>{{$a->name}}</td>
                {{-- <td>{{$a->kinerja_bulan}}</td> --}}
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
            </tr>
            @endforeach

        </tbody>
    </table>

</body>

</html>
