<?php

namespace App\Adapter\Presenter\Json;

use App\Adapter\Presenter\ViewModel\Json\JsonViewModel;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\ResponseFactory;
use Exception;

abstract class JsonPresenter
{
    public function __construct(private readonly ResponseFactory $responseFactory)
    {
    }

    /**
     * @param mixed $json
     * @return JsonResponse
     * @throws Exception
     */
    protected function jsonResponse($json = null): JsonResponse
    {
        $expandJsonViewModels = function ($item) use (&$expandJsonViewModels) {
            return match (true) {
                $item instanceof JsonViewModel => array_map($expandJsonViewModels, $item->toArray()),
                is_array($item) => array_map($expandJsonViewModels, $item),
                is_string($item) => mb_convert_encoding($item, 'UTF-8', 'UTF-8'),
                is_scalar($item) || is_null($item) => $item,
                default => throw new Exception(""),
            };
        };
        return $this->responseFactory
            ->json([
                'data' => $expandJsonViewModels($json),
            ], 200)
            ->header('Content-type', 'application/json')
            ->header('charset', 'UTF-8');
    }
}
