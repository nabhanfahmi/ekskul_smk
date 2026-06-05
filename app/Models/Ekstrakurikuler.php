<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\GaleriEkstrakurikuler;
use App\Models\Pertanyaan;

class Ekstrakurikuler extends Model
{
    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi',
        'deskripsi_rekomendasi',
        'gambar',
        'jadwal',
        'pembina',
        'lokasi',
    ];

    public function galeri()
    {
        return $this->hasMany(GaleriEkstrakurikuler::class);
    }

    public function pertanyaan()
    {
        return $this->hasMany(Pertanyaan::class);
    }
}