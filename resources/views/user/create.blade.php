@extends('layouts.app')

{{-- @section('user')
active
@endsection --}}

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="/user/tambah/save">
                        @csrf
                        <div class="panel-body">
                            <label class="text-muted d-block mb-2">Status Pegawai</label>
                            <div class="form-group">
                                <select class="form-control" name="status_pegawai" required>
                                    <option selected disabled>Pilih ...</option>
                                    <option value="Non PNS">Non PNS</option>
                                    <option value="PNS">PNS</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Nip/Nik</label>
                            <div class="form-group">
                                <input type="number" name="nip_nik"
                                    class="form-control @error('nip_nik') is-invalid @enderror" placeholder="nip/nik"
                                    required>

                                @error('nip_nik')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <label class="text-muted d-block mb-2">Nama</label>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Nama" required>
                            </div>

                            <label class="text-muted d-block mb-2">Pilih Golongan</label>
                            <div class="form-group">

                                <select class="form-control" name="golongan" id="golongan" required>
                                    <option value="" disable="true" selected="true">=== Silahkan Pilih
                                        Golongan ===</option>
                                    @foreach ($golongan as $key => $value)
                                    <option value="{{$value->golongan_id}}">{{ $value->golongan_nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Pilih Pangkat</label>
                            <div class=" form-group">
                                <select class="form-control" name="pangkat" id="pangkat" required>
                                    <option value="" disable="true" selected="true">=== Silahkan Pilih
                                        Golongan Dahulu ===
                                    </option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Grade</label>
                            <div class="form-group">
                                <select class="form-control" name="user_grade_id" required>
                                    <option selected disabled>Pilih Grade</option>
                                    @foreach ($grade as $a)

                                    <option value="{{$a->grade_id}}">Grade {{$a->grade_nama}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Jenis Kelamin</label>
                            <div class="form-group">
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Alamat</label>
                            <div class="form-group">
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                            </div>

                            <label class="text-muted d-block mb-2">Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>

                            <label class="text-muted d-block mb-2">Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir"
                                    required>
                            </div>

                            <label class="text-muted d-block mb-2">Agama</label>
                            <div class="form-group">
                                <select class="form-control" name="agama" required>
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Khonghucu">Khonghucu</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Pendidikan</label>
                            <div class="form-group">
                                <select class="form-control" name="pendidikan" required>
                                    <option selected disabled>Pilih Pendidikan</option>
                                    <option value="TAMAT SD / SEDERAJAT">TAMAT SD / SEDERAJAT</option>
                                    <option value="SLTP / SEDERAJAT">SLTP / SEDERAJAT</option>
                                    <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                    <option value="DIPLOMA I / II">DIPLOMA I / II</option>
                                    <option value="AKADEMI / DIPLOMA III / S. MUDA">AKADEMI / DIPLOMA III / S. MUDA
                                    </option>
                                    <option value="DIPLOMA IV / STRATA I">DIPLOMA IV / STRATA I</option>
                                    <option value="STRATA II">STRATA II</option>
                                    <option value="STRATA III">STRATA III</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Jabatan</label>
                            <div class="form-group">
                                <input type="text" name="jabatan" class="form-control" placeholder="Jabatan" required>
                            </div>

                            <label class="text-muted d-block mb-2">Status Perkawinan</label>
                            <div class="form-group">
                                <select class="form-control" name="status_perkawinan" required>
                                    <option selected disabled>Pilih Status</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin Tercatat">Kawin Tercatat</option>
                                    <option value="Kawin Belum Tercatat">Kawin Belum Tercatat</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Email</label>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                            </div>

                            <label class="text-muted d-block mb-2">No HP</label>
                            <div class="form-group">
                                <input type="number" name="no_hp" class="form-control" placeholder="No HP" required>
                            </div>

                            <label class="text-muted d-block mb-2">Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"
                                    required autocomplete="off">
                                @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <label class="text-muted d-block mb-2">Konfirmasi Password</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password"
                                    required autocomplete="off">
                                @error('password_confirmation')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            {{-- <label class="text-muted d-block mb-2">Level</label>
                                    <div class="form-group">
                                        <select class="form-control" name="level" required>
                                            <option selected disabled>Pilih Level</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Pegawai">Pegawai</option>
                                        </select>
                                    </div> --}}

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/grade" class="btn btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END INPUTS -->
        </div>
    </div>
</div>

<script src="{{ asset ('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset ('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset ('assets/vendor/chartist/js/chartist.min.js') }}"></script>
<script src="{{ asset ('assets/vendor/toastr/toastr.min.js') }}"></script>
<script src="{{ asset ('assets/scripts/klorofil-common.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
    $('#golongan').on('change', function (e) {
        console.log(e);
        var id_golongan = e.target.value;
        $.get('/json-pangkat?id_golongan=' + id_golongan, function (data) {
            console.log(data);
            $('#pangkat').empty();
            $('#pangkat').append(
                '<option value="0" disable="true" selected="true">=== Silahkan Pilih Pangkat ===</option>'
            );

            $('#kec').empty();
            $('#kec').append(
                '<option value="0" disable="true" selected="true">=== Pilih Kabupaten/Kota Dahulu ===</option>'
            );

            $('#villages').empty();
            $('#villages').append(
                '<option value="0" disable="true" selected="true">=== Select Villages ===</option>'
            );

            $.each(data, function (index, kabkotaObj) {
                $('#pangkat').append('<option value="' + kabkotaObj.pangkat_id + '">' +
                    kabkotaObj
                    .pangkat_nama + '</option>');
            })
        });
    });

    $('#pegawai').on('change', function (e) {
        console.log(e);
        var id_pegawai = e.target.value;
        $.get('/json-jk?id_pegawai=' + id_pegawai, function (data) {
            console.log(data);
            // $('#jenis_kelamin').empty();
            // $('#jenis_kelamin').append(
            //     '<input type="text" id="jenis_kelamin" name="detail_cuti_bersalin" class="form-control" placeholder="Cuti Bersalin" required>'
            //     );

            $.each(data, function (index, kecObj) {
                if (kecObj.jenis_kelamin == "Perempuan") {
                    $('#jenis_kelamin').prop("readonly", false);
                } else {
                    $('#jenis_kelamin').prop("readonly", true);
                }
            })
        });
    });

    $('#districts').on('change', function (e) {
        console.log(e);
        var districts_id = e.target.value;
        $.get('/json-village?districts_id=' + districts_id, function (data) {
            console.log(data);
            $('#villages').empty();
            $('#villages').append(
                '<option value="0" disable="true" selected="true">=== Select Villages ===</option>'
            );

            $.each(data, function (index, villagesObj) {
                $('#villages').append('<option value="' + villagesObj.id + '">' +
                    villagesObj
                    .name + '</option>');
            })
        });
    });

</script>
@endsection
