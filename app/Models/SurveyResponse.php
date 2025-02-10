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

    public function getQ1Attribute()
    {
        return $this->pertanyaan1 ?? '-';
    }

    public function getQ2Attribute()
    {
        return $this->pertanyaan2 ?? '-';
    }

    public function getQ3Attribute()
    {
        return $this->pertanyaan3 ?? '-';
    }

    public function getQ4Attribute()
    {
        return $this->pertanyaan4 ?? '-';
    }

    public function getQ5Attribute()
    {
        return $this->pertanyaan5 ?? '-';
    }
}