<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\User;
use App\grade;
use App\golongan;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = User::join('pangkats','pangkats.pangkat_id','users.user_pangkat_id')
        ->join('grades','grades.grade_id','users.user_grade_id')->get();

        return view('user.index', ['user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $grade = grade::all();
        $golongan = golongan::all();

        return view('user.create', ['grade' => $grade,'golongan' =>$golongan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nip_nik' => 'required|digits:18',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);

        $user = new User;
        $user->name = $request['name'];
        $user->user_pangkat_id = $request['pangkat'];
        $user->user_grade_id = $request['user_grade_id'];
        $user->email = $request['email'];
        $user->nip_nik = $request['nip_nik'];
        $user->jenis_kelamin = $request['jenis_kelamin'];
        $user->alamat = $request['alamat'];
        $user->tgl_lahir = $request['tgl_lahir'];
        $user->tempat_lahir = $request['tempat_lahir'];
        $user->agama = $request['agama'];
        $user->pendidikan = $request['pendidikan'];
        $user->jabatan = $request['jabatan'];
        $user->status_perkawinan = $request['status_perkawinan'];
        $user->status_pegawai = $request['status_pegawai'];
        $user->no_hp = $request['no_hp'];
        $user->level = "Pegawai";
        $user->password = Hash::make($request['password']);
        $user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $golongan = golongan::all();
        $grade = grade::all();
        $user = User::find($id);

        return view('user.edit', ['grade' => $grade, 'user' => $user,'golongan' => $golongan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nip_nik' => 'required|digits:18',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);
        
        $user = User::find($id);
        $user->name = $request['name'];
        $user->user_pangkat_id = $request['pangkat'];
        $user->user_grade_id = $request['user_grade_id'];
        $user->email = $request['email'];
        $user->nip_nik = $request['nip_nik'];
        $user->jenis_kelamin = $request['jenis_kelamin'];
        $user->alamat = $request['alamat'];
        $user->tgl_lahir = $request['tgl_lahir'];
        $user->tempat_lahir = $request['tempat_lahir'];
        $user->agama = $request['agama'];
        $user->pendidikan = $request['pendidikan'];
        $user->jabatan = $request['jabatan'];
        $user->status_perkawinan = $request['status_perkawinan'];
        $user->status_pegawai = $request['status_pegawai'];
        $user->no_hp = $request['no_hp'];
        $user->level = "Pegawai";
        $user->password = Hash::make($request['password']);
        // dd($user);
        $user->save();

        return redirect('/home')->with('sukses','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function daftar()
    {
        $grade = grade::all();
        $golongan = golongan::all();

        return view('user.create', ['grade' => $grade,'golongan' =>$golongan]);
    }

    public function editProfil($id)
    {
        $golongan = golongan::all();
        $grade = grade::all();
        $user = User::find($id);

        return view('user.edit', ['grade' => $grade, 'user' => $user,'golongan' => $golongan]);
    }
}
