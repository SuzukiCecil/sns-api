<?php

namespace App\Adapter\Presenter\Log\Dto;

use Illuminate\Http\Request;

/**
 * APIリクエスト時の入力情報を保持するDTO
 */
class RequestInput implements Input
{
    public function __construct(private readonly Request $request)
    {
    }

    /**
     * @inheritDoc
     */
    public function getExecutionStatement(): string
    {
        return $this->request->getMethod() . " " . $this->request->fullUrl();
    }

    /**
     * @inheritDoc
     */
    public function getMapper(): array
    {
        return $this->request->all();
    }
}
