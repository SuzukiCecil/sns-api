<?php

namespace App\Adapter\Presenter\Log\Dto;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputInterface;

/**
 * コンソール実行時の入力情報を保持するDTO
 */
class ConsoleInput implements Input
{
    public function __construct(
        private readonly Command $command,
        private readonly InputInterface $input,
    ) {
    }

    /**
     * @inheritDoc
     */
    public function getExecutionStatement(): string
    {
        return (string)$this->command->getName();
    }

    /**
     * @inheritDoc
     */
    public function getMapper(): array
    {
        return $this->input->getArguments();
    }
}
