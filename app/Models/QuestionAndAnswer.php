<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAndAnswer extends Model
{
    use HasFactory;
    protected $table = 'questions_and_answers';
    protected $fillable = [
        'nama_penanya',
        'email_penanya',
        'pertanyaan',
        'id_penjawab',
        'jawaban',
        'status',
    ];

    public function penjawab()
    {
        return $this->belongsTo(User::class, 'id_penjawab');
    }
}