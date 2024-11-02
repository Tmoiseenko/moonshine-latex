<?php

namespace Tmoiseenko\MoonshineLatex\Providers;

use Illuminate\Support\ServiceProvider;

class LatexServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'moonshine-latex');

    }
}
