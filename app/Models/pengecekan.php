<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengecekan extends Model
{
    use HasFactory;
    //pengecekan
    protected $table = 'pengecekan';
    protected $primaryKey = 'id_pengecekan';
    protected $fillable = ['tanggal_pengecekan'];
    public $timestamps = true;
}
