<?php

namespace App\Http\Controllers;

use App\grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $grade = grade::all();

        return view('grade.index', ['grade' => $grade]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('grade.create');
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
        $grade = new grade;

        $biaya = $request['grade_nominal'];
        $rup = preg_replace('/[Rp. ]/','',$biaya);
        $grade->grade_nama = $request['grade_nama'];
        $grade->grade_nominal = $rup;
        $grade->save();

        return redirect('/grade')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($grade)
    {
        //
        $grade = grade::find($grade);

        return view('grade.edit', ['grade' => $grade]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $grade)
    {
        //
        $grade = grade::find($grade);
        $grade->grade_nama = $request['grade_nama'];
        $biaya = $request['grade_nominal'];
        $rup = preg_replace('/[Rp. ]/','',$biaya);
        $grade->grade_nominal = $rup;
        $grade->save();

        return redirect('/grade')->with('sukses','Data Berhasil Diupdate');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy( $grade)
    {
        //
        $grade = grade::find($grade);
        $grade->delete();

        return redirect('/grade')->with('sukses','Data Berhasil Dihapus');
    }
}
