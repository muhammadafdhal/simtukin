<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\grade;
use App\User;
use Auth;
use PDF;
use App\keterlambatan;
use App\kinerja_pegawai;
use App\kinerja_pegawai_detail;
use App\Exports\TunjanganExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class TunjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function kinerja()
    {
        $kinerja = kinerja_pegawai::all();

        return view('tunjangan.kinerja', ['kinerja' => $kinerja]);
    }
    
    public function index($kinerja_id)
    {
        //
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $detail = kinerja_pegawai_detail::
                join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')->
                join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_kinerja_id', $kinerja_id)->get();
        
        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get();

        return view ('tunjangan.index', ['detail' => $detail, 'kinerja' => $kinerja,'terlambat' =>$terlambat]);
    }

    public function pegawai()
    {
        //
        $detail = kinerja_pegawai_detail::
                join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')->
                join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('users.id', Auth::user()->id)->get();
        
        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get();

        return view ('tunjangan.tunjangan', ['detail' => $detail, 'terlambat'=>$terlambat]);
    }

    public function pegawai_detail($detail_id)
    {
        $kinerja = kinerja_pegawai_detail::
        join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')
        ->join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_id', $detail_id)->find($detail_id);

        $terlambat = keterlambatan::where('terlambat_detail_id', $detail_id)->get();

        return view('tunjangan.tunjangan_pegawai_detail', ['kinerja' => $kinerja, 'terlambat' => $terlambat]);
    }

    public function cetak($kinerja_id)
    {
        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get();
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $detail = kinerja_pegawai_detail::
                join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')->
                join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_kinerja_id', $kinerja_id)->get();
        
        $pdf = PDF::loadview('tunjangan.tunjangan_pdf',['kinerja' => $kinerja, 'detail' => $detail,'terlambat' =>$terlambat]);
        return $pdf->download('Laporan Tunjangan Kinerja');
    }

    public function export_excel(Request $request)
    {
        $kinerja_id = $request->kinerja_id;

        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get();
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $detail = kinerja_pegawai_detail::
                join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')->
                join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_kinerja_id', $kinerja_id)->get();

        return Excel::download(new TunjanganExport($terlambat,$kinerja,$detail), 'tunjangan-pegawai.xlsx');
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
}
