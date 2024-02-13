<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class model_mobil extends Model
{
    use HasFactory;
    //model_mobil
    protected $table = 'model_mobil';
    protected $primaryKey = 'id_model_mobil';
    protected $fillable = ['tipe_mobil', 'merek_mobil', 'tahun_produksi'];
    public $timestamps = true;
}
