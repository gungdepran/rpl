<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;

    protected $table = 'destinasi_fasilitas';

    // Jika perlu, definisikan relasi ke destinasi wisata
    public function destinasi()
    {
        return $this->belongsTo(DestinasiWisata::class, 'id_destinasi');
    }

    public $timestamps = false;   
}