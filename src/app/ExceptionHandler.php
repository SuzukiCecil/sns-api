<?php

namespace App;

use App\Adapter\Converter\Exception\InvalidConverterParameterException;
use App\Adapter\Gateway\Exception\NotFoundException;
use App\Adapter\Presenter\Log\EmergencyLogPresenter;
use App\Adapter\Presenter\Log\InfoLogPresenter;
use App\Adapter\Presenter\Log\WarningLogPresenter;
use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;
use Illuminate\Foundation\Exceptions\Handler as BaseHandler;
use Throwable;

class ExceptionHandler extends BaseHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function report(Throwable $e)
    {
        if ($e instanceof NotFoundException) {
            /** @var InfoLogPresenter $presenter */
            $presenter = app(InfoLogPresenter::class);
            $presenter->execute($e->getMessage());
            return;
        }

        if ($e instanceof InvalidConverterParameterException) {
            /** @var WarningLogPresenter $presenter */
            $presenter = app(WarningLogPresenter::class);
            $presenter->execute($e);
            return;
        }

        /** @var EmergencyLogPresenter $presenter */
        $presenter = app(EmergencyLogPresenter::class);
        $presenter->execute($e);
    }

    public function render($request, Throwable $e)
    {
        return match (true) {
            $e instanceof InvalidConverterParameterException => response()->json($e->getMessage(), 400),
            $e instanceof NotFoundException => response()->json($e->getMessage(), 404),
            $e instanceof ViolateDomainRuleException => response()->json($e->getMessage(), 500),
            default => parent::render($request, $e),
        };
    }
}
