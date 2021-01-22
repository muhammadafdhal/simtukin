@extends('template.app')

@section('content')
<script src="{{ asset('assets/jquery.min.js')}}"></script>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div>
                <!-- INPUTS -->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Form Input Absen</strong></h3>
                    </div>

                    <form method="POST" action="/kinerja/absensi/{{$kinerja->kinerja_id}}/save">
                        @csrf{{ method_field('patch')}}

                        <div class="panel-body">
                            {{-- <input value="{{$user->id}}" name="detail_user_id" hidden> --}}

                            {{-- <label class="text-muted d-block mb-2">Bulan</label>
                            <div class="form-group">
                                <input type="text" value="{{$kinerja->kinerja_bulan}}" disabled name="bulan"
                            class="form-control" placeholder="Izin" required>
                        </div> --}}

                        <label class="text-muted d-block mb-2">Nama Pegawai</label>
                        <div class="form-group">
                            <select class="form-control" name="id_pegawai" id="pegawai" required>
                                <option selected disabled>Pilih Pegawai</option>
                                @foreach ($user as $a)

                                <option value="{{$a->id}}">
                                    {{$a->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- <label class="text-muted d-block mb-2">Izin</label>
                            <div class="form-group">
                                <input type="number" name="detail_izin" class="form-control" placeholder="Izin"
                                    required>
                            </div> --}}

                        <label class="text-muted d-block mb-2">Sakit Dengan Surat</label>
                        <div class="form-group">
                            <input type="number" name="detail_sakit_dgn_surat" class="form-control"
                                placeholder="Sakit Dengan Surat" required>
                        </div>

                        <label class="text-muted d-block mb-2">Sakit Tanpa Surat</label>
                        <div class="form-group">
                            <input type="number" name="detail_sakit_tanpa_surat" class="form-control"
                                placeholder="Sakit Tanpa Surat" required>
                        </div>

                        <label class="text-muted d-block mb-2">Cuti Bersalin (Khusus Perempuan)</label>
                        <div class="form-group">
                            <input type="number" id="jenis_kelamin" name="detail_cuti_bersalin" class="form-control"
                                placeholder="Cuti Bersalin" required>
                        </div>

                        <label class="text-muted d-block mb-2">Tidak Masuk</label>
                        <div class="form-group">
                            <input type="number" name="detail_tanpa_keterangan" class="form-control"
                                placeholder="Tidak Masuk" required>
                        </div>

                        <div class="form-group">
                            <table class="" id="dynamic_field">
                                <label class="col-form-label">Masukan Waktu Keterlambatan</label>
                                <tr>
                                    <td width="800px">
                                        <select class="form-control name_list" name="detail_keterlambatan[]">
                                            <option selected disabled>Pilih Waktu Keterlambatan</option>
                                            <option value="terlambat 1">1 - 30 Menit</option>
                                            <option value="terlambat 2">31 - 60 Menit</option>
                                            <option value="terlambat 3">61 - 90 Menit</option>
                                            <option value="terlambat 4"> > 91 Menit </option>
                                        </select>
                                    </td>
                                    <td><button type="button" name="add" id="add" class="btn btn-success"><i
                                                class="lnr lnr-plus-circle"></i></button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <label class="text-muted d-block mb-2">Melakukan Hukuman Disiplin</label>
                        <div class="form-group">
                            <select class="form-control" name="detail_hukuman_disiplin" required>
                                <option selected disabled>Pilih ...</option>
                                <option value="Tidak">Tidak</option>
                                <option value="Iya">Iya</option>
                            </select>
                        </div>


                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="/kinerja/detail/{{$kinerja->kinerja_id}}" class="btn btn-danger">Kembali</a>
                </div>
                </form>
            </div>
            <!-- END INPUTS -->
            <script>
                $(document).ready(function () {
                    var i = 1;
                    $('#add').click(function () {
                        i++;
                        $('#dynamic_field').append('<tr id="row' + i +
                            '"><td><select name="detail_keterlambatan[]" placeholder="" class="form-control name_list"><option selected disabled>Pilih Waktu Keterlambatan</option><option value="terlambat 1">1 - 30 Menit</option><option value="terlambat 2">31 - 60 Menit</option><option value="terlambat 3">61 - 90 Menit</option><option value="terlambat 4"> > 91 Menit </option></select></td><td><button type="button" name="remove" id="' +
                            i +
                            '" class="btn btn-danger btn_remove">X</button></td></tr>');
                    });
                    $(document).on('click', '.btn_remove', function () {
                        var button_id = $(this).attr("id");
                        $('#row' + button_id + '').remove();
                    });
                });

            </script>
        </div>
    </div>
</div>
</div>
@endsection
