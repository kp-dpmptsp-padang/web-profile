<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ServiceType extends Model
{
    protected $fillable = ['name'];

    /**
     * Get the testimonies for the service type.
     */
    public function testimonies(): HasMany
    {
        return $this->hasMany(Testimony::class);
    }
}