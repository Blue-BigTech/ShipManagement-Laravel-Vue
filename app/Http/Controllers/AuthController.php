<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    protected $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * 管理者ログイン
     *
     * @group Auth
     * @param LoginRequest $request
     */
    public function adminLogin(LoginRequest $request): object
    {
        return $this->service->adminLogin($request);
    }

    /**
     * 貸舟業者ログイン
     *
     * @group Auth
     * @param LoginRequest $request
     */
    public function lenderLogin(LoginRequest $request): object
    {
        return $this->service->lenderLogin($request);
    }


    /**
     * ログアウト
     *
     * @authenticated
     * @group Auth
     * @param int $userId
     */
    public function logout(int $userId): ?array
    {
        return $this->service->logout($userId);
    }
}
