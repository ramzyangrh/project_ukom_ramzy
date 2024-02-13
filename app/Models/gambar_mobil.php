<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_mobil extends Model
{
    use HasFactory;
    //gambar_mobil
    protected $table = 'gambar_mobil';
    protected $fillable = ['gambar_mobil'];
    public $timestamps = true;
}
