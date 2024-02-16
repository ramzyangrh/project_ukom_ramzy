<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $primaryKey = 'username';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'username',
        'id_admin',
        'id_penyewa',
        'id_pemilik_mobil',
        'password',
        'role',
        'email',
        'profile_image'
    ];

    // Relasi dengan tabel 'admin', 'penyewa', 'pemilik_mobil' sesuai foreign key yang telah ditentukan
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }

    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa', 'id_penyewa');
    }

    public function pemilikMobil()
    {
        return $this->belongsTo(Pemilik_Mobil::class, 'id_pemilik_mobil', 'id_pemilik_mobil');
    }
}