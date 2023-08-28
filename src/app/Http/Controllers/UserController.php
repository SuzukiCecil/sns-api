<?php

namespace App\Http\Controllers;

use App\Adapter\Converter\Request\UserSignInConverter;
use App\Adapter\Presenter\Response\Json\User\UserSignInPresenter;
use App\Contexts\User\Application\Usecase\UserSignInUsecase;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function userSignIn(UserSignInConverter $input, UserSignInUsecase $usecase, UserSignInPresenter $presenter): JsonResponse
    {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    public function userSignUp(): JsonResponse
    {
        // TODO：サインアップAPIの実装
        return new JsonResponse();
    }

    public function getFollower(): JsonResponse
    {
        // TODO：フォロワー取得APIの実装
        return new JsonResponse();
    }

    public function getFollowee(): JsonResponse
    {
        // TODO：フォロイー取得APIの実装
        return new JsonResponse();
    }

    public function postFollower(): JsonResponse
    {
        // TODO：フォロワー登録APIの実装
        return new JsonResponse();
    }
}
