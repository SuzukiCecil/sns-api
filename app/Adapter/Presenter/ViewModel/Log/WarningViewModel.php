<?php

namespace App\Adapter\Presenter\ViewModel\Log;

use App\Adapter\Presenter\Log\Dto\Input;
use Throwable;

/**
 * アラートの発砲など障害調査を想定しない例外のログのロギング内容を定義する抽象ViewModel
 */
class WarningViewModel implements LogViewModel
{
    public function __construct(
        private readonly Throwable $throwable,
        private readonly Input $input
    ) {
    }

    public function message(): string
    {
        return $this->throwable->getMessage();
    }

    public function context(): array
    {
        return [
            "execution" => $this->input->getExecutionStatement(),
            "input" => $this->input->getMapper(),
            "exception" => $this->throwable,
        ];
    }

    public function logLevel(): string
    {
        return "WARNING";
    }
}
