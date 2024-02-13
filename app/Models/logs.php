<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logs extends Model
{
    use HasFactory;
    //logs
    protected $table = 'log';
    protected $primaryKey = 'id_log';
    protected $fillable = ['ip_addrres', 'user', 'log', 'tanggal', 'aksi'];
    public $timestamps = false;
}
