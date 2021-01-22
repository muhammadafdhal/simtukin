<?php

namespace App\Exports;

use App\Tunjangan;
use App\keterlambatan;
use App\kinerja_pegawai;
use App\kinerja_pegawai_detail;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class TunjanganExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($terlambat,$kinerja,$detail)
    {
        $this->terlambat = $terlambat;
        $this->kinerja = $kinerja;
        $this->detail = $detail;
    }

    use Exportable;
    
    public function view(): View
    {
        return view('tunjangan.tunjangan_excel', [
            'terlambat' => $this->terlambat,
            'kinerja' => $this->kinerja,
            'detail' => $this->detail
        ]);
    }
    
    // public function view(): View
    // {
    //     return view('tunjangan.tunjangan_pdf', [
    //         'keterlambatan' => keterlambatan::join('kinerja_pegawai_details','kinerja_pegawai_details.detail_id','keterlambatans.terlambat_detail_id')->get(),
    //         'kinerja_pegawai' => kinerja_pegawai::find($kinerja_id),
    //         'kinerja_pegawai_detail' => kinerja_pegawai_detail::
    //         join('users','users.id','kinerja_pegawai_details.detail_user_id')->join('grades','grades.grade_id','users.user_grade_id')->
    //         join('kinerja_pegawais','kinerja_pegawais.kinerja_id','kinerja_pegawai_details.detail_kinerja_id')->where('detail_kinerja_id', $kinerja_id)->get()
    //     ]);
    // }
}
