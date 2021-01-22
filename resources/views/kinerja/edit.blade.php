@extends('template.app')

@section('kinerja')
    active
@endsection

@section('content')
<div class="main-content">
    <div class="container-fluid">
        {{-- <h3 class="page-title">Elements</h3> --}}
        <div class="row">
            <div>
                <!-- INPUTS -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Form Edit</h3>
                    </div>
                <form method="POST" action="/kinerja/edit/{{$kinerja->kinerja_id}}/save">
                        @csrf
                        {{method_field('patch')}}
                        <div class="panel-body">
                            <label class="text-muted d-block mb-2">Bulan</label>
                            <div class="form-group">
                                <select class="form-control" name="kinerja_bulan" required>
                                    <option disabled>Pilih Bulan</option>
                                    <option value="Januari" <?php if($kinerja->kinerja_bulan == 'Januari') echo 'selected' ?> >Januari</option>
                                    <option value="Februari" <?php if($kinerja->kinerja_bulan == "Februari") echo "selected"; ?> >Februari</option>
                                    <option value="Maret" <?php if($kinerja->kinerja_bulan == "Maret") echo "selected"; ?> >Maret</option>
                                    <option value="April" <?php if($kinerja->kinerja_bulan == "April") echo "selected"; ?> >April</option>
                                    <option value="Mei" <?php if($kinerja->kinerja_bulan == "Mei") echo "selected"; ?> >Mei</option>
                                    <option value="Juni" <?php if($kinerja->kinerja_bulan == "Juni") echo "selected"; ?> >Juni</option>
                                    <option value="Juli" <?php if($kinerja->kinerja_bulan == "Juli") echo "selected"; ?> >Juli</option>
                                    <option value="Agustus" <?php if($kinerja->kinerja_bulan == "Agustus") echo "selected"; ?> >Agustus</option>
                                    <option value="September" <?php if($kinerja->kinerja_bulan == "September") echo "selected"; ?> >September</option>
                                    <option value="Oktober" <?php if($kinerja->kinerja_bulan == "Oktober") echo "selected"; ?> >Oktober</option>
                                    <option value="November" <?php if($kinerja->kinerja_bulan == "November") echo "selected"; ?> >November</option>
                                    <option value="Desember" <?php if($kinerja->kinerja_bulan == "Desember") echo "selected"; ?> >Desember</option>
                                    
                                </select>
                            </div>

                            <label>Tahun</label>
                            <div class="form-group">
                                <select class="form-control" name="kinerja_tahun" required>
                                    <option disabled>Pilih Tahun</option>
                                    <option value="2020" <?php if($kinerja->kinerja_tahun == "2020") echo "selected"; ?> >2020</option>
                                    <option value="2021" <?php if($kinerja->kinerja_tahun == "2021") echo "selected"; ?> >2021</option>
                                    <option value="2022" <?php if($kinerja->kinerja_tahun == "2022") echo "selected"; ?> >2022</option>
                                    <option value="2023" <?php if($kinerja->kinerja_tahun == "2023") echo "selected"; ?> >2023</option>
                                    <option value="2024" <?php if($kinerja->kinerja_tahun == "2024") echo "selected"; ?> >2024</option>
                                    <option value="2025" <?php if($kinerja->kinerja_tahun == "2025") echo "selected"; ?> >2025</option>
                                </select>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/kinerja" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- END INPUTS -->
            </div>
        </div>
    </div>
</div>
@endsection
