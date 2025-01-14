<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SurveyAnswer extends Model
{
    protected $fillable = [
        'response_id',
        'question_id',
        'option_id'
    ];

    public function response(): BelongsTo
    {
        return $this->belongsTo(SurveyResponse::class);
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(SurveyQuestion::class);
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(SurveyOption::class);
    }
}