<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    //mobil
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    protected $fillable = ['merek', 'tipe', 'status', 'image', 'id_pemilik_mobil'];
    public $timestamps = true;
}

//'foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil',