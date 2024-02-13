<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ulasan extends Model
{
    use HasFactory;
    //ulasan
    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = ['no_polisi', 'ulasan', 'rating'];
    public $timestamps = true;
}
