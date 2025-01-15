<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

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

    public function getHashedIdAttribute()
    {
        return Crypt::encryptString($this->id);
    }

    public static function findByHash($hash)
    {
        try {
            $id = Crypt::decryptString($hash);
            return self::find($id);
        } catch (\Exception $e) {
            return null;
        }
    }
}