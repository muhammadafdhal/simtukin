@extends('template.app')

@section('grade')
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
                        <h3 class="panel-title">Form Input Grade</h3>
                    </div>
                    <form method="POST" action="/grade/tambah/save">
                        @csrf
                        <div class="panel-body">
                            <label>Kelas Grade</label>
                            <input type="number" name="grade_nama" class="form-control" placeholder="Kelas Grade" required>
                            <br>

                            <label>Nominal</label>
                            <input id="rupiah" type="text" name="grade_nominal" class="form-control" placeholder="Nominal Grade" required>
                            <br>
                            
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/grade" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
                <!-- END INPUTS -->
            </div>
        </div>
    </div>
</div>
@endsection
