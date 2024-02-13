<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemilik_mobil extends Model
{
    use HasFactory;
    //pemilik_mobil
    protected $table = 'pemilik_mobil';
    protected $primaryKey = 'id_pemilik_mobil';
    protected $fillable = ['nama_pemilik_mobil', 'alamat_pemilik_mobil', 'no_telepon_pemilik_mobil', 'foto_bpkb_pemilik_mobil', 'foto_ktp_pemilik_mobil'];
    public $timestamps = true;
}
