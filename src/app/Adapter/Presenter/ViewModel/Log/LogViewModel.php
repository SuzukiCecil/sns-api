<?php

namespace App\Adapter\Presenter\ViewModel\Log;

/**
 * ロギング内容を定義する抽象ViewModel
 */
interface LogViewModel
{
    /**
     * ロギングメッセージを返却する関数
     * @return string
     */
    public function message(): string;

    /**
     * ロギング時のコンテクストを返却する関数
     * @return array
     */
    public function context(): array;

    /**
     * ログレベルを返却する関数
     * ロギング時のアラート発砲の要否はログレベルにて判定
     * @return string
     */
    public function logLevel(): string;
}
