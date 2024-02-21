<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelMobil extends Model
{
    protected $table = 'model_mobil';
    protected $primaryKey = 'id_model_mobil';
    protected $guarded = [];

    public function tarif()
    {
        return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif');
    }
}