<?php

namespace App\Adapter\Presenter\Log;

use App\Adapter\Presenter\ViewModel\Log\LogViewModel;
use Psr\Log\LoggerInterface;

/**
 * ログ出力を行う抽象親Presenter
 */
abstract class LogPresenter
{
    public function __construct(
        private readonly LoggerInterface $logger,
    ) {
    }

    protected function info(LogViewModel $viewModel): void
    {
        $this->logger->info($this->getMessage($viewModel), $viewModel->context());
    }

    protected function warning(LogViewModel $viewModel): void
    {
        $this->logger->warning($this->getMessage($viewModel), $viewModel->context());
    }

    protected function emergency(LogViewModel $viewModel): void
    {
        $this->logger->error($this->getMessage($viewModel), $viewModel->context());
    }

    private function getMessage(LogViewModel $viewModel): string
    {
        return "【{$viewModel->logLevel()}】{$viewModel->message()}";
    }
}
