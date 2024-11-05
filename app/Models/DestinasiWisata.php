<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinasiWisata extends Model
{
    use HasFactory;
    
    protected $table = 'destinasi_wisata';
    protected $primaryKey = 'id_destinasi';
    protected $fillable = [
        'nama_destinasi',
        'kabupaten_kota',
        'harga_tiket',
        'rating_destinasi',
        'contact_person',
        'alamat_lengkap',
        'jenis_wisata',
        'reservasi',
        'jam_buka',
        'jam_tutup',
        'foto_destinasi'
    ];

    public $timestamps = false;

    // Define the getKabupatenKotaOptions method
    public static function getKabupatenKotaOptions()
    {
        return [
            'Buleleng',
            'Badung',
            'Gianyar',
            'Karangasem',
            'Klungkung',
            'Bangli',
            'Tabanan',
            'Jembrana'
        ];
    }

    public function medsos()
    {
        return $this->hasMany(MediaSosial::class, 'id_destinasi');
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_destinasi');
    }
}