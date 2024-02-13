<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengecekan_perlengkapan extends Model
{
    use HasFactory;
    //pengecekan_perlengkapan
    protected $table = 'pengecekan_perlengkapan';
    protected $fillable = ['kondisi'];
    public $timestamps = true;
}
