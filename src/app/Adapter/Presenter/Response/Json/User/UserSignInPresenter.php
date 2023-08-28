<?php

namespace App\Adapter\Presenter\Response\Json\User;

use App\Adapter\Presenter\Response\Json\JsonPresenter;
use App\Adapter\Presenter\ViewModel\Json\User\UserViewModel;
use App\Contexts\User\Application\UsecaseOutput\UserSignInOutput;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Cookie;

class UserSignInPresenter extends JsonPresenter
{
    public function execute(UserSignInOutput $output): JsonResponse
    {
        $coolieValue = md5(uniqid(rand(), true));
        Cache::put($coolieValue, $output->getMatchedUser()->id()->value(), 86400);
        return $this->jsonResponse(
            new UserViewModel($output->getMatchedUser()),
        )->withCookie(new Cookie("u_id", $coolieValue, 86400));
    }
}
