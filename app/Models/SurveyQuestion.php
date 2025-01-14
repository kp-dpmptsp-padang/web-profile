<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SurveyQuestion extends Model
{
    protected $fillable = [
        'question_text',
        'question_type',
        'order',
        'is_active'
    ];

    public function options(): HasMany
    {
        return $this->hasMany(SurveyOption::class, 'question_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(SurveyAnswer::class, 'question_id');
    }
}