<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;

class TrackVisitor
{

    public function handle($request, Closure $next)
    {
        $visitor = Visitor::where('ip_address', $request->ip())
            ->where('user_agent', $request->userAgent())
            ->whereDate('visit_date', now()->toDateString())
            ->first();

        if (!$visitor) {
            Visitor::create([
                'ip_address' => $request->ip(),
                'visit_date' => now()->toDateString(),
                'user_agent' => $request->userAgent()
            ]);
        }

        return $next($request);
    }
}