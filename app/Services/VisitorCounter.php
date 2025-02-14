<?php
// app/Services/VisitorCounter.php
namespace App\Services;

use App\Models\Visitor;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Session;

class VisitorCounter
{
    protected $agent;

    public function __construct()
    {
        $this->agent = new Agent();
    }

    public function track()
    {
        if ($this->agent->isRobot()) {
            return;
        }

        if (!Session::has('visitor_id')) {
            Session::put('visitor_id', uniqid('', true));
        }

        $sessionId = Session::get('visitor_id');

        $existingVisit = Visitor::where('session_id', $sessionId)
            ->where('ip_address', request()->ip())
            ->where('user_agent', request()->userAgent())
            ->where('visited_at', '>=', Carbon::now()->subDay())
            ->exists();

        if (!$existingVisit) {
            Visitor::create([
                'ip_address' => request()->ip(),
                'user_agent' => request()->userAgent(),
                'page_url' => request()->fullUrl(),
                'session_id' => $sessionId,
                'visited_at' => Carbon::now()
            ]);

            // Clear cache when new visitor is added
            $this->clearCache();
        }
    }

    public function getCounts()
    {
        $this->track();

        return Cache::remember('visitor_counts', now()->addMinutes(5), function () {
            return [
                'totalVisitors' => $this->getTotalVisitors(),
                'todayVisitors' => $this->getTodayVisitors(),
                'monthlyVisitors' => $this->getMonthlyVisitors()
            ];
        });
    }

    protected function getTotalVisitors()
    {
        return Visitor::count();
    }

    protected function getTodayVisitors()
    {
        return Visitor::whereDate('visited_at', Carbon::today())->count();
    }

    protected function getMonthlyVisitors()
    {
        return Visitor::whereMonth('visited_at', Carbon::now()->month)
            ->whereYear('visited_at', Carbon::now()->year)
            ->count();
    }

    protected function clearCache()
    {
        Cache::forget('visitor_counts');
    }
}