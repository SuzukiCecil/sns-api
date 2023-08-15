<?php

namespace App\Providers;

use App\Adapter\Gateway\Query\ActivityQueryGateway;
use App\Domain\Service\Repository\Query\ActivityQuery;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ActivityQuery::class, ActivityQueryGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
