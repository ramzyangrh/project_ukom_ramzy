<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'no_polisi';
    protected $fillable = ['no_polisi', 'id_pemilik_mobil', 'id_model_mobil', 'foto_stnk_mobil', 'status_ketersediaan', 'detail_mobil'];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik_Mobil::class, 'id_pemilik_mobil', 'id_pemilik_mobil');
    }

    public function model()
    {
        return $this->belongsTo(ModelMobil::class, 'id_model_mobil', 'id_model_mobil');
    }
}
