<?php

namespace App\Services;

use App\Enums\RoleId;
use App\Http\Requests\PasswordRequest;
use App\Repositories\UserRepository;
use App\Repositories\BoatRepository;
use App\Enums\HttpStatus;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository, BoatRepository $boatRepository)
    {
        $this->repository = $repository;
        $this->boatRepository = $boatRepository;
    }

    /**
     * ログインユーザー取得
     *
     * @authenticated
     * @group User
     */
    public function fetchLoginUser($request): object
    {
        $user = $request->user();
        $userId = $user->id;
        $roleId =  $user->role_id;

        if ($roleId === RoleId::ADMIN) {
            return $user;
        }

        if ($roleId === RoleId::LENDER) {
            $lender = $this->repository->fetchLenderUser($userId);
            $lender->boat = $this->boatRepository->fetchListByLenderId($lender->lender_id);
            return $lender;
        }

        // 将来的に
        // if ($roleId === RoleId::VIEWER) {
        //     return $this->repository->fetchViewerUser($userId);
        // }
        return response()->json([], HttpStatus::NO_CONTENT);
    }
    /**
     * パスワード更新
     *
     * @authenticated
     * @group User
     */
    public function changePassword(PasswordRequest $request, $id)
    {
        $this->repository->changePassword($request, $id);
        return response()->json([], HttpStatus::NO_CONTENT);
    }
}
