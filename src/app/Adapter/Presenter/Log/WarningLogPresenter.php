<?php

namespace App\Adapter\Presenter\Log;

use App\Adapter\Presenter\Log\Dto\Input;
use App\Adapter\Presenter\ViewModel\Log\WarningViewModel;
use Psr\Log\LoggerInterface;
use Throwable;

/**
 * アラートの発砲など障害調査を想定しない例外のログを出力するPresenter
 */
class WarningLogPresenter extends LogPresenter
{
    public function __construct(
        LoggerInterface $logger,
        private readonly Input $input,
    ) {
        parent::__construct($logger);
    }

    public function execute(Throwable $throwable): void
    {
        $this->warning(
            new WarningViewModel($throwable, $this->input)
        );
    }
}
