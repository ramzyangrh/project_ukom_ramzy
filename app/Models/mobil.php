<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    // protected $fillable = ['foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil'];
    protected $fillable = ['merek', 'tipe', 'status', 'image', 'id_pemilik_mobil'];
    public $timestamps = true;
}
