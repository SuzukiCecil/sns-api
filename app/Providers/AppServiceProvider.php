<?php

namespace App\Providers;

use App\Adapter\Gateway\Query\ActivityQueryGateway;
use App\Adapter\Gateway\Query\UserQueryGateway;
use App\Domain\Service\Repository\Query\ActivityQuery;
use App\Domain\Service\Repository\Query\UserQuery;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ActivityQuery::class, ActivityQueryGateway::class);
        $this->app->bind(UserQuery::class, UserQueryGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
