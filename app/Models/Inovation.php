<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inovation extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'url',
        'id_logo',
    ];

    public function logo()
    {
        return $this->belongsTo(Picture::class, 'id_logo');
    }
}