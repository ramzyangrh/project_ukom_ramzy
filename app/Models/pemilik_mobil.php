<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik_Mobil extends Model
{
    use HasFactory;

    protected $table = 'pemilik_mobil';
    protected $primaryKey = 'id_pemilik_mobil';
    protected $guarded = [];

    protected $fillable = [
        'id_pemilik_mobil',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pemilik_mobil', 'username');
    }
}