<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    //mobil
    protected $table = 'mobil';
    protected $primaryKey = 'no_polisi';
    protected $fillable = ['foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil'];
    public $timestamps = true;
}
