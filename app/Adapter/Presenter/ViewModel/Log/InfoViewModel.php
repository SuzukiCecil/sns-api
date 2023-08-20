<?php

namespace App\Adapter\Presenter\ViewModel\Log;

use App\Adapter\Presenter\Log\Dto\Input;

/**
 * アクセスログのロギングなど例外とは関係ないログのロギング内容を定義する抽象ViewModel
 */
class InfoViewModel implements LogViewModel
{
    public function __construct(
        private readonly string $message,
        private readonly Input $input,
    ) {
    }

    public function message(): string
    {
        return $this->message;
    }

    public function context(): array
    {
        return [
            "execution" => $this->input->getExecutionStatement(),
            "input" => $this->input->getMapper(),
        ];
    }

    public function logLevel(): string
    {
        return "INFO";
    }
}
