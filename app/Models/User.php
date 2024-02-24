<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
   
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ='users';

    protected $primaryKey = 'username';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_penyewa',
        'username',
        'email',
        'password',
        'role',
        'profile_image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'username');
    }
    
    public function penyewa()
    {
        return $this->belongsTo(Penyewa::class, 'id_penyewa', 'username');
    }
    
    public function pemilikMobil()
    {
        return $this->belongsTo(Pemilik_Mobil::class, 'id_pemilik_mobil', 'username');
    }
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getProfileImageUrlAttribute()
{
    return $this->profile_image ? Storage::url($this->profile_image) : asset('images/default-profile.jpg');
}

}
