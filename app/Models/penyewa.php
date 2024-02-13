<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyewa extends Model
{
    use HasFactory;
    //penyewa
    protected $table = 'penyewa';
    protected $primaryKey = 'id_penyewa';
    protected $fillable = ['nama_penyewa', 'alamat_penyewa', 'no_telepon_penyewa', 'foto_skck_penyewa', 'foto_sim_penyewa', 'foto_ktp_penyewa', 'foto_penyewa'];
    public $timestamps = true;
}
