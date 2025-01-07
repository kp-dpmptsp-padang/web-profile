<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'caption',
        'nama_file',
        'mine_type',
        'alt_text',
        'urutan',
    ];
}