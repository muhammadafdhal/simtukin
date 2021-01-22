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
                        <h3 class="panel-title">Form Edit Grade</h3>
                    </div>
                    <form method="POST" action="/grade/edit/{{$grade->grade_id}}/save">
                        @csrf
                        {{method_field('patch')}}
                        <div class="panel-body">
                            <label>Kelas Grade</label>
                            <input type="number" name="grade_nama" value="{{$grade->grade_nama}}" class="form-control"
                                placeholder="Kelas Grade" required>
                            <br>

                            <label>Nominal (Rp.)</label>
                            <input id="rupiah" type="text" name="grade_nominal" value="{{$grade->grade_nominal}}"
                                class="form-control" placeholder="Nominal Grade" required>
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
