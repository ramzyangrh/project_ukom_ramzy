<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_ulasan extends Model
{
    use HasFactory;
    //gambar_ulasan
    protected $table = 'gambar_ulasan';
    protected $fillable = ['gambar_ulasan'];
    public $timestamps = true;

}
