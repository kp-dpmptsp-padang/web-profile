<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveyResponse extends Model
{
    protected $fillable = [
        'noHp',
        'nama',
        'alamat',
        'umur',
        'jk',
        'pendidikan',
        'pekerjaan',
        'layanan',
        'saran',
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(SurveyAnswer::class, 'response_id');
    }
}