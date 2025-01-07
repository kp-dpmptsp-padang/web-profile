<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;

    protected $table = 'posts_tags';

    protected $fillable = [
        'id_post',
        'id_tag',
    ];
}