<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriEkstrakurikuler extends Model
{
    protected $fillable = [
        'ekstrakurikuler_id',
        'gambar_galeri',
        'deskripsi_galeri',
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}