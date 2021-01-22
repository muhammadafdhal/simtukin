@extends('template.app')

@section('user')
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
                    <form method="POST" action="/user/edit/{{$user->id}}/save">

                        @csrf {{ method_field('patch')}}

                        <div class="panel-body">
                            <label class="text-muted d-block mb-2">Status Pegawai</label>
                            <div class="form-group">
                                <select class="form-control" name="status_pegawai" required>
                                    <option selected disabled>Pilih ...</option>
                                    <option value="Non PNS"
                                        <?php if($user->status_pegawai =='Non PNS') echo 'selected' ?>>Non PNS
                                    </option>
                                    <option value="PNS" <?php if($user->status_pegawai =='PNS') echo 'selected' ?>>PNS
                                    </option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Nip/Nik</label>
                            <div class="form-group">
                                <input type="number" value="{{$user->nip_nik}}" name="nip_nik"
                                    class="form-control @error('nip_nik') is-invalid @enderror" placeholder="nip/nik"
                                    required>

                                @error('nip_nik')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <label class="text-muted d-block mb-2">Nama</label>
                            <div class="form-group">
                                <input type="text" value="{{$user->name}}" name="name" class="form-control"
                                    placeholder="Nama" required>
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
                                        Pangkat ===
                                    </option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Grade</label>
                            <div class="form-group">
                                <select class="form-control" name="user_grade_id" required>
                                    <option selected disabled>Pilih Grade</option>
                                    @foreach ($grade as $a)

                                    <option value="{{$a->grade_id}}" <?php if ($user->user_grade_id == $a->grade_id) {
                                    echo "selected";
                                } ?>>Grade {{$a->grade_nama}}</option>

                                    @endforeach
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Jenis Kelamin</label>
                            <div class="form-group">
                                <select class="form-control" name="jenis_kelamin" required>
                                    <option selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        <?php if($user->jenis_kelamin == 'Laki-Laki') echo 'selected' ?>>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        <?php if($user->jenis_kelamin == 'Perempuan') echo 'selected' ?>>
                                        Perempuan</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Alamat</label>
                            <div class="form-group">
                                <input type="text" value="{{$user->alamat}}" name="alamat" class="form-control"
                                    placeholder="Alamat" required>
                            </div>

                            <label class="text-muted d-block mb-2">Tanggal Lahir</label>
                            <div class="form-group">
                                <input type="date" value="{{$user->tgl_lahir}}" name="tgl_lahir" class="form-control"
                                    required>
                            </div>

                            <label class="text-muted d-block mb-2">Tempat Lahir</label>
                            <div class="form-group">
                                <input type="text" value="{{$user->tempat_lahir}}" name="tempat_lahir"
                                    class="form-control" placeholder="Tempat Lahir" required>
                            </div>

                            <label class="text-muted d-block mb-2">Agama</label>
                            <div class="form-group">
                                <select class="form-control" name="agama" required>
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="Islam" <?php if($user->agama =='Islam') echo 'selected' ?>>
                                        Islam</option>
                                    <option value="Protestan" <?php if($user->agama =='Protestan') echo 'selected' ?>>
                                        Protestan
                                    </option>
                                    <option value="Katolik" <?php if($user->agama =='Katolik') echo 'selected' ?>>
                                        Katolik</option>
                                    <option value="Hindu" <?php if($user->agama =='Hindu') echo 'selected' ?>>
                                        Hindu</option>
                                    <option value="Buddha" <?php if($user->agama =='Buddha') echo 'selected' ?>>
                                        Buddha</option>
                                    <option value="Khonghucu" <?php if($user->agama =='Khonghucu') echo 'selected' ?>>
                                        Khonghucu
                                    </option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Pendidikan</label>
                            <div class="form-group">
                                <select class="form-control" name="pendidikan" required>
                                    <option selected disabled>Pilih Pendidikan</option>
                                    <option value="TAMAT SD / SEDERAJAT"
                                        <?php if($user->pendidikan =='TAMAT SD / SEDERAJAT') echo 'selected' ?>>
                                        TAMAT SD / SEDERAJAT</option>
                                    <option value="SLTP / SEDERAJAT"
                                        <?php if($user->pendidikan =='SLTP / SEDERAJAT') echo 'selected' ?>>SLTP
                                        / SEDERAJAT</option>
                                    <option value="SLTA / SEDERAJAT"
                                        <?php if($user->pendidikan =='SLTA / SEDERAJAT') echo 'selected' ?>>SLTA
                                        / SEDERAJAT</option>
                                    <option value="DIPLOMA I / II"
                                        <?php if($user->pendidikan =='DIPLOMA I / II') echo 'selected' ?>>
                                        DIPLOMA I / II</option>
                                    <option value="AKADEMI / DIPLOMA III / S. MUDA"
                                        <?php if($user->pendidikan =='AKADEMI / DIPLOMA III / S. MUDA') echo 'selected' ?>>
                                        AKADEMI / DIPLOMA III / S. MUDA</option>
                                    <option value="DIPLOMA IV / STRATA I"
                                        <?php if($user->pendidikan =='DIPLOMA IV / STRATA I') echo 'selected' ?>>
                                        DIPLOMA IV / STRATA I</option>
                                    <option value="STRATA II"
                                        <?php if($user->pendidikan =='STRATA II') echo 'selected' ?>>STRATA II
                                    </option>
                                    <option value="STRATA III"
                                        <?php if($user->pendidikan =='STRATA III') echo 'selected' ?>>STRATA III
                                    </option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Jabatan</label>
                            <div class="form-group">
                                <input type="text" value="{{$user->jabatan}}" name="jabatan" class="form-control"
                                    placeholder="Jabatan" required>
                            </div>

                            <label class="text-muted d-block mb-2">Status Perkawinan</label>
                            <div class="form-group">
                                <select class="form-control" name="status_perkawinan" required>
                                    <option selected disabled>Pilih Status</option>
                                    <option value="Belum Kawin"
                                        <?php if($user->status_perkawinan =='Belum Kawin') echo 'selected' ?>>
                                        Belum Kawin</option>
                                    <option value="Kawin Tercatat"
                                        <?php if($user->status_perkawinan =='Kawin Tercatat') echo 'selected' ?>>
                                        Kawin Tercatat</option>
                                    <option value="Kawin Belum Tercatat"
                                        <?php if($user->status_perkawinan =='Kawin Belum Tercatat') echo 'selected' ?>>
                                        Kawin Belum Tercatat</option>
                                    <option value="Cerai Hidup"
                                        <?php if($user->status_perkawinan =='Cerai Hidup') echo 'selected' ?>>
                                        Cerai Hidup</option>
                                    <option value="Cerai Mati"
                                        <?php if($user->status_perkawinan =='Cerai Mati') echo 'selected' ?>>
                                        Cerai Mati</option>
                                </select>
                            </div>

                            <label class="text-muted d-block mb-2">Email</label>
                            <div class="form-group">
                                <input type="email" value="{{$user->email}}" name="email" class="form-control"
                                    placeholder="Email" required>
                            </div>

                            <label class="text-muted d-block mb-2">No HP</label>
                            <div class="form-group">
                                <input type="number" value="{{$user->no_hp}}" name="no_hp" class="form-control"
                                    placeholder="No HP" required>
                            </div>

                            <label class="text-muted d-block mb-2">Password</label>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required autocomplete="off">
                                @error('password')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            <label class="text-muted d-block mb-2">Konfirmasi Password</label>
                            <div class="form-group">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Konfirmasi Password" required autocomplete="off">
                                @error('password_confirmation')
                                <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>

                            {{-- <label class="text-muted d-block mb-2">Level</label>
                            <div class="form-group">
                                <select class="form-control" name="level" required>
                                    <option selected disabled>Pilih Level</option>
                                    <option value="Admin" <?php if($user->level =='Admin') echo 'selected' ?>>
                                        Admin</option>
                                    <option value="Pegawai" <?php if($user->level =='Pegawai') echo 'selected' ?>>
                                        Pegawai</option>
                                </select>
                            </div> --}}

                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/user" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
                <!-- END INPUTS -->
            </div>
        </div>
    </div>
</div>
@endsection
