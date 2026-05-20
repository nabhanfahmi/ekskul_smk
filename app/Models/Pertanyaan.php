<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Ekstrakurikuler;

class Pertanyaan extends Model
{
    protected $fillable = [
        'ekstrakurikuler_id',
        'pertanyaan',
    ];

    public function ekstrakurikuler()
    {
        return $this->belongsTo(Ekstrakurikuler::class);
    }
}