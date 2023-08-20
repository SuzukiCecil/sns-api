<?php

namespace App\Adapter\Presenter\Log\Dto;

/**
 * プログラム実行時の入力情報を保持する抽象DTO
 */
interface Input
{
    /**
     * プログラム実行時の実行状態を取得する関数
     * @return string
     */
    public function getExecutionStatement(): string;

    /**
     * プログラム実行時の入力値を取得する関数
     * @return array
     */
    public function getMapper(): array;
}
