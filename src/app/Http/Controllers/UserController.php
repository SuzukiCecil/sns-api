<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    public function userSignIn(): JsonResponse
    {
        // TODO：サインインAPIの実装
        return new JsonResponse();
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
