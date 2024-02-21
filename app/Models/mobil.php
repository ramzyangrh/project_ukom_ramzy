<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'no_polisi';
    protected $fillable = ['foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil'];
    public $timestamps = true;
}

//'foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil',