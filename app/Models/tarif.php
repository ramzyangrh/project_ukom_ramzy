<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tarif extends Model
{
    use HasFactory;
    //tarif
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['nominal', 'id_tarif'];
    public $timestamps = true;

    public function mobil()
    {
        return $this->hasOne(Mobil::class, 'id_tarif', 'id_tarif');
    }
}
