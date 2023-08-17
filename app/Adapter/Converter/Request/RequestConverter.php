<?php

namespace App\Adapter\Converter\Request;

use App\Adapter\Converter\Exception\InvalidRequestParameterException;
use App\Contexts\Base\Domain\Model\Exception\InvalidDataException;
use Exception;
use Illuminate\Http\Request;
use Throwable;

/**
 *
 */
abstract class RequestConverter
{
    /**
     * @param Request $request
     * @throws InvalidRequestParameterException
     * @throws Exception
     */
    public function __construct(protected readonly Request $request)
    {
        try {
            $this->execute();
        } catch (InvalidRequestParameterException $e) {
            throw $e;
        } catch (InvalidDataException $e) {
            throw new InvalidRequestParameterException(
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
     * @throws InvalidRequestParameterException
     * @throws InvalidDataException
     */
    abstract protected function execute(): void;
}
