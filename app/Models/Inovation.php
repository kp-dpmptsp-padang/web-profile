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
    ];

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'imageable');
    }
}