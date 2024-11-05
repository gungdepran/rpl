<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // protected $fillable = ['username', 'password']; // Pastikan ini mencakup kolom yang sesuai
    protected $fillable = [
        'nama_user', 'jenis_kelamin', 'username', 'no_telepon', 'email', 'password',
    ];
    
}