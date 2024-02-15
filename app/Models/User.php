<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    //akun
    protected $keyType = 'string';
    protected $table = 'users';
    protected $primaryKey = 'username';
    protected $fillable = ['password', 'role', 'email', 'profile_image'];
    public $timestamps = false;
}
