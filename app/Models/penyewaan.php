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
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['tanggal_mulai', 'tanggal_selesai', 'total_biaya'];
    public $timestamps = true;
    public function mobil()
    {
        return $this->belongsTo(mobil::class, 'id_mobil', 'id_mobil');
    }
    public function penyewa()
    {
        return $this->belongsTo(penyewa::class, 'id_penyewa', 'id_penyewa');
    }
}
