<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        "nama",
        "nip",
        "jabatan",
        "id_dokumen",
    ];

    public function document()
    {
    return $this->hasOne(Document::class, 'id', 'id_dokumen');
    }
    
}
