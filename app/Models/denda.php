<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denda extends Model
{
    use HasFactory;
    //denda
    protected $table = 'denda';
    protected $primaryKey = 'id_denda';
    protected $fillable = ['total_denda', 'status_pembayaran', 'jenis_denda', 'deskripsi_denda', 'tenggat_waktu_pembayaran'];
    protected $timestamps = true;
}
