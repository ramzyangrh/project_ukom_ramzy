<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    use HasFactory;
    //akun
    protected $table = 'akun';
    protected $primaryKey = 'username';
    protected $fillable = ['password', 'role', 'email'];
    protected $timestamps = false;
}
