<?php

namespace App\Adapter\Presenter\Log;

use App\Adapter\Presenter\Log\Dto\Input;
use App\Adapter\Presenter\ViewModel\Log\InfoViewModel;
use Psr\Log\LoggerInterface;

/**
 * アクセスログのロギングなど例外とは関係ないログを出力するPresenter
 */
class InfoLogPresenter extends LogPresenter
{
    public function __construct(
        LoggerInterface $logger,
        private readonly Input $input,
    ) {
        parent::__construct($logger);
    }

    public function execute(string $message): void
    {
        $this->info(
            new InfoViewModel($message, $this->input)
        );
    }
}
