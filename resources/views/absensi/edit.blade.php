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
                        <h3 class="panel-title"><strong>Form Edit Absen</strong></h3>
                    </div>

                    <form method="POST" action="/absensi/edit/{{$absen->detail_id}}/save">
                        @csrf{{ method_field('patch')}}

                        <div class="panel-body">

                            <label class="text-muted d-block mb-2">Nama Pegawai</label>
                            <div class="form-group">
                                <select class="form-control" name="id_pegawai" required>
                                    <option selected disabled>Pilih Pegawai</option>
                                    @foreach ($user as $a)

                                    <option value="{{$a->id}}" <?php if($a->id == $absen->detail_user_id)
                                echo "selected"; ?>>
                                        {{$a->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>


                            <label class="text-muted d-block mb-2">Sakit Dengan Surat</label>
                            <div class="form-group">
                                <input type="number" value="{{$absen->detail_sakit_dgn_surat}}"
                                    name="detail_sakit_dgn_surat" class="form-control" placeholder="Sakit Dengan Surat"
                                    required>
                            </div>

                            <label class="text-muted d-block mb-2">Sakit Tanpa Surat</label>
                            <div class="form-group">
                                <input type="number" value="{{$absen->detail_sakit_tanpa_surat}}"
                                    name="detail_sakit_tanpa_surat" class="form-control" placeholder="Sakit Tanpa Surat"
                                    required>
                            </div>

                            <label class="text-muted d-block mb-2">Cuti Bersalin</label>
                            <div class="form-group">
                                <input type="number" value="{{$absen->detail_cuti_bersalin}}"
                                    name="detail_cuti_bersalin" class="form-control" placeholder="Cuti Bersalin"
                                    required>
                            </div>

                            <label class="text-muted d-block mb-2">Tidak Masuk</label>
                            <div class="form-group">
                                <input type="number" value="{{$absen->tanpa_keterangan}}" name="detail_tanpa_keterangan"
                                    class="form-control" placeholder="Tidak Masuk" required>
                            </div>

                            <div class="form-group">
                                <table class="" id="dynamic_field">
                                    <label class="col-form-label">Masukan Waktu Keterlambatan</label>
                                    <tr>
                                        <td width="800px">
                                            @foreach ($terlambat as $a)
                                            <select class="form-control name_list" name="detail_keterlambatan[]"
                                                required>
                                                <option selected disabled> Waktu Keterlambatan</option>
                                                <option value="terlambat 1" <?php if($a->terlambat_waktu == "terlambat 1") echo "selected"; ?> >1 - 30 Menit</option>
                                                <option value="terlambat 2" <?php if($a->terlambat_waktu == "terlambat 2") echo "selected"; ?> >31 - 60 Menit</option>
                                                <option value="terlambat 3" <?php if($a->terlambat_waktu == "terlambat 3") echo "selected"; ?> >61 - 90 Menit</option>
                                                <option value="terlambat 4"> <?php if($a->terlambat_waktu == "terlambat 4") echo "selected"; ?> > 91 Menit </option>
                                            </select>
                                            @endforeach

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
                                    <option value="Tidak"
                                        <?php if($absen->detail_hukuman_disiplin == "Tidak") echo "selected"; ?>>Tidak
                                    </option>
                                    <option value="Iya"
                                        <?php if($absen->detail_hukuman_disiplin == "Iya") echo "selected"; ?>>Iya
                                    </option>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="/kinerja" class="btn btn-danger">Kembali</a>
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
