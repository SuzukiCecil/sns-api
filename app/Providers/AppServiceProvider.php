<?php

namespace App\Providers;

use App\Adapter\Gateway\Command\ActivityCommandGateway;
use App\Adapter\Gateway\Query\ActivityQueryGateway;
use App\Adapter\Gateway\Query\UserQueryGateway;
use App\Adapter\Presenter\Log\Dto\Input;
use App\Adapter\Presenter\Log\Dto\RequestInput;
use App\Contexts\Activity\Domain\Service\Repository\Command\ActivityCommand;
use App\Contexts\Activity\Domain\Service\Repository\Query\ActivityQuery;
use App\Contexts\User\Domain\Service\Repository\Query\UserQuery;
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
        $this->app->bind(ActivityCommand::class, ActivityCommandGateway::class);
        $this->app->bind(Input::class, RequestInput::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
