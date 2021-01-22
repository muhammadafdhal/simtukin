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
                        <h3 class="panel-title">Form Tambah</h3>
                    </div>
                    <form method="POST" action="/kinerja/tambah/save">
                        @csrf
                        <div class="panel-body">
                            <label class="text-muted d-block mb-2">Bulan</label>
                            <div class="form-group">
                                <select class="form-control" name="kinerja_bulan" required>
                                    <option selected disabled>Pilih Bulan</option>
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                    
                                </select>
                            </div>

                            <label>Tahun</label>
                            <div class="form-group">
                                <select class="form-control" name="kinerja_tahun" required>
                                    <option selected disabled>Pilih Tahun</option>
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
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
