<?php

namespace App\Http\Controllers;

use App\kinerja_pegawai_detail;
use App\User;
use App\keterlambatan;
use App\kinerja_pegawai;
use Illuminate\Http\Request;

class KinerjaPegawaiDetailController extends Controller
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

    public function detail($kinerja_id)
    {
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $detail = kinerja_pegawai_detail::
                join('users','users.id','kinerja_pegawai_details.detail_user_id')->
                join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_kinerja_id', $kinerja_id)->get();

        $det = kinerja_pegawai_detail::pluck('detail_id');
        
        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get();

        return view('absensi.index', ['detail' => $detail, 'kinerja' => $kinerja, 'terlambat' =>$terlambat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kinerja_id)
    {
        //
        // $user = User::find($id);
        $kinerja = kinerja_pegawai::find($kinerja_id);
        $detail = kinerja_pegawai_detail::where('detail_kinerja_id', $kinerja_id)->get();

        if (count($detail) > 0) {
            $user = User::leftJoin('kinerja_pegawai_details','users.id','=','kinerja_pegawai_details.detail_user_id')->whereNull('kinerja_pegawai_details.detail_user_id')->where('level', 'Pegawai')->get();
        }        
        else
        {
            $user = User::where('level','Pegawai')->get();
        }
        

        return view('absensi.create', ['kinerja' => $kinerja, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $kinerja_id)
    {
        //

        // dd($request['detail_keterlambatan']);
        // $terlambat = json_encode($request->detail_keterlambatan);
        $absen = new kinerja_pegawai_detail;
        $absen->detail_user_id = $request['id_pegawai'];
        $absen->detail_kinerja_id = $kinerja_id;
        $absen->detail_izin = $request['detail_izin'];
        $absen->detail_sakit_dgn_surat = $request['detail_sakit_dgn_surat'];
        $absen->detail_sakit_tanpa_surat = $request['detail_sakit_tanpa_surat'];
        if ($request['detail_cuti_bersalin']==null) {
            $absen->detail_cuti_bersalin = 0;
        }
        else {
            $absen->detail_cuti_bersalin = $request['detail_cuti_bersalin'];
        }
        $absen->detail_hukuman_disiplin = $request['detail_hukuman_disiplin'];
        $absen->tanpa_keterangan = $request['detail_tanpa_keterangan'];
        // $absen->detail_keterlambatan = $terlambat;
        // dd($absen);
        $absen->save();


        $pegawai = kinerja_pegawai_detail::orderBy('detail_id','desc')->first();
        $id = $pegawai->detail_id;

        if ($request['detail_keterlambatan'] == null) {

            return redirect('/kinerja/detail/'.$kinerja_id);
        }

        else 
        {
        for ($i=0; $i < count($request->detail_keterlambatan); $i++) { 
            $waktu = $request->detail_keterlambatan[$i];
            
            $terlambat = new keterlambatan;
            $terlambat->terlambat_detail_id = $id;
            $terlambat->terlambat_waktu = $waktu;
            $terlambat->save();
            }
        // dd($waktu);
        return redirect('/kinerja/detail/'.$kinerja_id);
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\kinerja_pegawai_detail  $kinerja_pegawai_detail
     * @return \Illuminate\Http\Response
     */
    public function show(kinerja_pegawai_detail $kinerja_pegawai_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\kinerja_pegawai_detail  $kinerja_pegawai_detail
     * @return \Illuminate\Http\Response
     */
    public function edit( $detail_id)
    {
        //
        
        $user = User::where('level','Pegawai')->get();
        $terlambat = keterlambatan::where('terlambat_detail_id',$detail_id)->get();
        $absen = kinerja_pegawai_detail::find($detail_id);
        return view('absensi.edit', ['absen' => $absen, 'user' => $user,'terlambat' => $terlambat]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\kinerja_pegawai_detail  $kinerja_pegawai_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $detail_id)
    {
        //

        // $terlambat = json_encode($request->detail_keterlambatan);
        $absen = kinerja_pegawai_detail::find($detail_id);
        $absen->detail_user_id = $request['id_pegawai'];
        // $absen->detail_kinerja_id = $kinerja_id;
        $absen->detail_izin = $request['detail_izin'];
        $absen->detail_sakit_dgn_surat = $request['detail_sakit_dgn_surat'];
        $absen->detail_sakit_tanpa_surat = $request['detail_sakit_tanpa_surat'];
        $absen->detail_cuti_bersalin = $request['detail_cuti_bersalin'];
        $absen->detail_hukuman_disiplin = $request['detail_hukuman_disiplin'];
        $absen->tanpa_keterangan = $request['detail_tanpa_keterangan'];
        // $absen->detail_keterlambatan = $terlambat;
        
        $absen->save();

        $terlambat = keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->where('terlambat_detail_id',$detail_id)->first();

        if ($terlambat->terlambat_detail_id == $detail_id) {
            for ($i=0; $i < count($request->detail_keterlambatan); $i++) { 
                $waktu = $request->detail_keterlambatan[$i];
                // $terlambat->terlambat_detail_id = $terlambat->terlambat_detail_id;
                $terlambat->terlambat_waktu = $waktu;
                $terlambat->save();
            }
        }
        
        $kinerja = kinerja_pegawai_detail::
        join('users','users.id','kinerja_pegawai_details.detail_user_id')->
        join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_id', $detail_id)->first();
        // dd($kinerja->kinerja_id);

        return redirect('/kinerja/detail/'. $kinerja->kinerja_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\kinerja_pegawai_detail  $kinerja_pegawai_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy( $detail_id)
    {
        //
        $absen = $kinerja = kinerja_pegawai_detail::
        join('users','users.id','kinerja_pegawai_details.detail_user_id')->
        join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_id', $detail_id)->first();
        $absen->delete();
        return redirect ('/kinerja/detail/'. $absen->kinerja_id);
    }

    public function tunjangan($detail_id)
    {
        $kinerja = kinerja_pegawai_detail::
        join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')
        ->join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_id', $detail_id)->find($detail_id);

        $terlambat = keterlambatan::where('terlambat_detail_id', $detail_id)->get();

        return view('absensi.detail_tunjangan', ['kinerja' => $kinerja, 'terlambat' => $terlambat]);
    }
}
