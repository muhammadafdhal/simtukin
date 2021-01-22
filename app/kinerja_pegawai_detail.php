<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kinerja_pegawai_detail extends Model
{
    //
    protected $primaryKey = 'detail_id';
    protected $casts = [
        'detail_keterlambatan' => 'array'
    ];
}
