<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nama_file',
        'id_admin',
        'id_jenis',
        'tahun',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'id_admin');
    }

    public function jenis()
    {
        return $this->belongsTo(DocumentType::class, 'id_jenis');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id_dokumen');
    }

    public function scopeExcludeEmployeeDocuments($query)
    {
        return $query->whereDoesntHave('employee');
    }

    public function scopeExcludeStandarPelayanan($query)
    {
        return $query->whereHas('jenis', function ($query) {
            $query->where('jenis_dokumen', '!=', 'standar-pelayanan');
        });
    }

    public function scopeExcludeEmployeeAndStandarPelayananDocuments($query)
    {
        return $query->excludeEmployeeDocuments()
                    ->excludeStandarPelayanan();
    }
}