<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keterlambatan extends Model
{
    //
    protected $primaryKey = 'terlambat_id';
    protected $fillable = ['terlambat_waktu'];
}
