<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_admin',
        'judul',
        'deskripsi',
        'url',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }
}