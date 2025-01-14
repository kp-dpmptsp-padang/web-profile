<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyOption extends Model
{
    protected $fillable = [
        'question_id',
        'option_text',
        'option_value',
        'order'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(SurveyQuestion::class);
    }
}