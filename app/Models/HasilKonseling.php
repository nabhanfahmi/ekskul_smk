<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKonseling extends Model
{
    use HasFactory;

    protected $table = 'hasil_konselings';

    protected $fillable = [
        'user_id',
        'minat',
        'ekstrakurikuler_id',
        'hasil',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATION
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ekstrakurikuler()
{
    return $this->belongsTo(Ekstrakurikuler::class);
}

    /*
    |--------------------------------------------------------------------------
    | ACCESSOR
    |--------------------------------------------------------------------------
    */

    public function getShortHasilAttribute()
    {
        return \Str::limit($this->hasil, 80);
    }
}