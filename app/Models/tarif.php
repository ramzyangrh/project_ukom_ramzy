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
    protected $fillable = ['nominal'];
    public $timestamps = true;
}
