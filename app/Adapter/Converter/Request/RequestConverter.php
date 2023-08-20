<?php

namespace App\Adapter\Converter\Request;

use App\Adapter\Converter\Exception\InvalidConverterParameterException;
use App\Contexts\Base\Domain\Exception\ViolateDomainRuleException;
use Exception;
use Illuminate\Http\Request;
use Throwable;

/**
 * APIの入力をハンドリングする抽象親Converter
 */
abstract class RequestConverter
{
    /**
     * @param Request $request
     * @throws InvalidConverterParameterException
     * @throws Exception
     */
    public function __construct(protected readonly Request $request)
    {
        try {
            $this->execute();
        } catch (InvalidConverterParameterException $e) {
            throw $e;
        } catch (ViolateDomainRuleException $e) {
            throw new InvalidConverterParameterException(
                message: $e->getMessage(),
                previous: $e
            );
        } catch (Throwable $throwable) {
            throw new Exception(
                message: $throwable->getMessage(),
                previous: $throwable,
            );
        }
    }

    /**
     * @throws InvalidConverterParameterException
     * @throws ViolateDomainRuleException
     */
    abstract protected function execute(): void;
}
