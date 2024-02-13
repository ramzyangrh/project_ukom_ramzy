<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perlengkapan extends Model
{
    use HasFactory;
    //perlengkapan
    protected $table = 'perlengkaan';
    protected $primaryKey = 'id_perlengkapan';
    protected $fillable = ['nama_perlengkapan'];
    public  $timestamps = true;
}
