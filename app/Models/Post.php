<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_penulis',
        'judul',
        'konten',
        'id_gambar',
        'jenis',
        'slug',
    ];

    public function penulis()
    {
        return $this->belongsTo(User::class, 'id_penulis');
    }

    public function gambar()
    {
        return $this->belongsTo(Picture::class, 'id_gambar');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'posts_tags', 'id_post', 'id_tag');
    }
}