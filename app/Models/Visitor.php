<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Visitor extends Model
{
    protected $fillable = [
        'ip_address',
        'visited_at',
        'user_agent',
        'page_url',
        'session_id'
    ];

    protected $casts = [
        'visited_at' => 'datetime'
    ];

    public function scopeToday($query)
    {
        return $query->whereDate('visited_at', Carbon::today());
    }

    public function scopeThisMonth($query)
    {
        return $query->whereMonth('visited_at', Carbon::now()->month)
                    ->whereYear('visited_at', Carbon::now()->year);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('visited_at', Carbon::now()->year);
    }

    public function scopeFromIp($query, $ip)
    {
        return $query->where('ip_address', $ip);
    }

    public function scopeFromUrl($query, $url)
    {
        return $query->where('page_url', 'like', "%{$url}%");
    }

    public function getBrowserAttribute()
    {
        $agent = new \Jenssegers\Agent\Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->browser();
    }

    public function getDeviceAttribute()
    {
        $agent = new \Jenssegers\Agent\Agent();
        $agent->setUserAgent($this->user_agent);
        return $agent->device();
    }
}