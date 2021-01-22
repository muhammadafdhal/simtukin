<?php

namespace App\Http\Controllers;

use App\kinerja_pegawai;
use App\tahun;
use Illuminate\Http\Request;

class KinerjaPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kinerja = kinerja_pegawai::all();

        return view('kinerja.index', ['kinerja' =>$kinerja]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kinerja = kinerja_pegawai::whereNotNull('kinerja_bulan')->whereNotNull('kinerja_tahun')->get();
        return view('kinerja.create', ['kinerja' => $kinerja]);
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
        $kinerja = kinerja_pegawai::where('kinerja_bulan',$request['kinerja_bulan'])->where('kinerja_tahun',$request['kinerja_tahun'])->get();

        if (count($kinerja) > 0) {
            return redirect('/kinerja') ->with('gagal','Data Sudah Ada');
        }
        else {
            $kinerja = new kinerja_pegawai;
            $kinerja->kinerja_status = "belum";
            $kinerja->kinerja_bulan = $request['kinerja_bulan'];
            $kinerja->kinerja_tahun = $request['kinerja_tahun'];
            $kinerja->save();

            return redirect('/kinerja')->with('sukses','Data Berhasil Ditambahkan');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kinerja_pegawai  $kinerja_pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(kinerja_pegawai $kinerja_pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kinerja_pegawai  $kinerja_pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit( $kinerja_id)
    {
        //
        $kinerja = kinerja_pegawai::find($kinerja_id);

        return view('kinerja.edit', ['kinerja' => $kinerja]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kinerja_pegawai  $kinerja_pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kinerja_id)
    {
        //
        $kinerja = kinerja_pegawai::where('kinerja_bulan',$request['kinerja_bulan'])->where('kinerja_tahun',$request['kinerja_tahun'])->get();

        if (count($kinerja) > 0) {
            return redirect('/kinerja') ->with('gagal','Data Sudah Ada');
        }
        else {
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $kinerja->kinerja_status = "belum";
        $kinerja->kinerja_bulan = $request['kinerja_bulan'];
        $kinerja->kinerja_tahun = $request['kinerja_tahun'];
        $kinerja->save();

        return redirect('/kinerja')->with('sukses','Data Berhasil Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kinerja_pegawai  $kinerja_pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy( $kinerja_pegawai)
    {
        //
        $kinerja = kinerja_pegawai::find($kinerja_pegawai);
        $kinerja->delete();

        return redirect('/kinerja')->with('sukses','Data Berhasil Dihapus');
    }

    public function status($kinerja_id)
    {
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $kinerja->kinerja_status = "selesai";
        $kinerja->save();

        return redirect('/kinerja')->with('sukses','Status Berhasil Diupdate');
    }
}
