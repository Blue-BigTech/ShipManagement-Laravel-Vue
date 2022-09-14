<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
// use App\Http\Requests\UserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * ログインユーザー取得
     *
     * @authenticated
     * @param Request $request
     */
    public function fetchLoginUser(Request $request)
    {
        return $this->service->fetchLoginUser($request);
    }
    /**
     * パスワード更新
     *
     * @authenticated
     * @group User
     * @param PasswordRequest $request
     * @param mixed $id
     */
    public function changePassword(PasswordRequest $request, $id)
    {
        return $this->service->changePassword($request, $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
