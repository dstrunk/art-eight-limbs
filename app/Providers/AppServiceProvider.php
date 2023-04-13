<?php

namespace App\Providers;

use App\Services\EntryGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->app->singleton(EntryGenerator::class, fn () => new EntryGenerator());
    }
}
