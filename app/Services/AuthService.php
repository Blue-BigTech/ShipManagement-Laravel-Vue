<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Enums\RoleId;
use App\Repositories\UserRepository;
use App\Repositories\LenderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Exceptions\CustomException;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository, LenderRepository $lenderRepository)
    {
        $this->userRepository = $userRepository;
        $this->lenderRepository = $lenderRepository;
    }

    public function adminLogin($request)
    {
        $credentials = $request->only('login_id', 'password');
        // $user = $this->userRepository->fetchUserByLoginAccount($credentials['login_id'], RoleId::ADMIN);
        $user = $this->userRepository->fetchUserByLoginAccount($credentials['login_id']);
        // 認証エラー
        if (!$user) {
            abort(response()->json(['error_msg' => 'ログインIDが正しくありません。'], HttpStatus::UNAUTHORIZED));
        }
        if (!Hash::check($credentials['password'], $user->password)) {
            abort(response()->json(['error_msg' => 'パスワードが正しくありません。'], HttpStatus::UNAUTHORIZED));
        }
        if ($user->role_id !== RoleId::ADMIN) {
            abort(response()->json(['error_msg' => '管理者用ページにログインする権限のないアカウントです。'], HttpStatus::UNAUTHORIZED));
        }

        // $user = $this->userRepository->fetchAdminUser($user->id);
        $user->access_token = $this->_updateToken($user);
        $this->userRepository->updateLoginLog($user->id);
        return $user;
    }

    public function lenderLogin($request)
    {
        $credentials = $request->only('login_id', 'password');
        $user = $this->userRepository->fetchUserByLoginAccount($credentials['login_id']);

        // 認証エラー
        if (!$user) {
            abort(response()->json(['error_msg' => 'ログインIDが正しくありません。'], HttpStatus::UNAUTHORIZED));
        }
        if (!Hash::check($credentials['password'], $user->password)) {
            abort(response()->json(['error_msg' => 'パスワードが正しくありません。'], HttpStatus::UNAUTHORIZED));
        }
        if ($user->role_id !== RoleId::LENDER) {
            abort(response()->json(['error_msg' => '貸舟業者用ページにログインする権限のないアカウントです。'], HttpStatus::UNAUTHORIZED));
        }

        // ページ開いたときと同じvuexのデータ状態にすることも可能
        // $lender = $this->repository->fetchLenderUser($user->id);
        // $lender->boat = $this->boatRepository->fetchListByLenderId($lender->lender_id);

        $user->access_token = $this->_updateToken($user);
        $this->userRepository->updateLoginLog($user->id);
        return $user;
    }

    public function logout(int $userId): ?array
    {
        $user = $this->userRepository->fetchUserById($userId);

        if (!$user) {
            abort(response()->json(['error_msg' => '指定されたユーザーは存在しません'], HttpStatus::NOT_FOUND));
        }
        $user->tokens()->delete();
        return null;
    }

    private function _updateToken($user)
    {
        $user = Auth::loginUsingId($user->id);
        $token = $user->createToken('access-token');
        $params = [
            'access_token' => $token->plainTextToken,
        ];
        $user = $this->userRepository->updateAccessToken($user->id, collect($params));
        return $user->access_token;
    }
}
