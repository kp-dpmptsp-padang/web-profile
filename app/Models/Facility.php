<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'id_gambar',
        'deskripsi',
    ];

    public function gambar()
    {
        return $this->belongsTo(Picture::class, 'id_gambar');
    }
}