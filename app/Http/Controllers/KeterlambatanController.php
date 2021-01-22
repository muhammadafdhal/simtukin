<?php

namespace App\Http\Controllers;

use App\keterlambatan;
use App\golongan;
use App\pangkat;
use App\user;
use Illuminate\Http\Request;

class KeterlambatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pangkat(Request $request)
    {
        $id_golongan = $request['id_golongan'];
        $pangkat = pangkat::where('pangkat_golongan_id', '=', $id_golongan)->get();
        return response()->json($pangkat);
    }

    public function pegawai(Request $request)
    {
        $id_pegawai = $request['id_pegawai'];
        $user = User::where('id',$id_pegawai)->get();

        return response()->json($user);

    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\keterlambatan  $keterlambatan
     * @return \Illuminate\Http\Response
     */
    public function show(keterlambatan $keterlambatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\keterlambatan  $keterlambatan
     * @return \Illuminate\Http\Response
     */
    public function edit(keterlambatan $keterlambatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\keterlambatan  $keterlambatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, keterlambatan $keterlambatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\keterlambatan  $keterlambatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(keterlambatan $keterlambatan)
    {
        //
    }
}
