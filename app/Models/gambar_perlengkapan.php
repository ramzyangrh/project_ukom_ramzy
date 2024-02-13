<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gambar_perlengkapan extends Model
{
    use HasFactory;
    //gambar_perlengkapan
    protected $table = 'gambar_perlengkapan';
    protected $fillable = ['gambar_perlengkapan'];
    public $timestamps = true;
}
