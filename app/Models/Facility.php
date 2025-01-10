<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'urutan',
    ];

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'imageable');
    }
}