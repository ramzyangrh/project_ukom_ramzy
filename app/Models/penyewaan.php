<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyewaan extends Model
{
    use HasFactory;
    //penyewaan
    protected $table = 'penyewaan';
    protected $primaryKey = 'id_penyewaan';
    protected $fillable = ['tanggal_mulai', 'tanggal_selesai', 'total_biaya'];
    public $timestamps = true;
}
