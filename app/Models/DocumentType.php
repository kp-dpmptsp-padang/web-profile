<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_dokumen',
    ];

    public function documents()
    {
        return $this->hasMany(Document::class, 'id_jenis');
    }
}