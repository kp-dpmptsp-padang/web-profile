<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'link',
        'order',
        'is_active',
    ];

    public function pictures()
    {
        return $this->morphMany(Picture::class, 'imageable');
    }
}