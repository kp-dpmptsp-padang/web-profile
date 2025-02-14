<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\VisitorCounter;

class ViewComposerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(VisitorCounter::class);
    }

    public function boot()
    {
        View::composer('partials.footer', function ($view) {
            $visitorCounter = app(VisitorCounter::class);
            $view->with($visitorCounter->getCounts());
        });
    }
}