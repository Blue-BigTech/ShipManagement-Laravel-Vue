<?php

namespace App\Repositories;

use App\Models\User;
use App\Enums\RoleId;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
    /**
     * ユーザー 新規登録
     *
     * @authenticated
     * @group User
     */
    public function storeUser($userRequest)
    {
        return $this->model->storeData(collect($userRequest));
    }
    /**
     * ユーザー 更新
     *
     * @authenticated
     * @group User
     */
    public function updateUser($id, $userRequest)
    {
        return $this->model->updateData($id, collect($userRequest));
    }
    /**
     * ユーザー 論理削除
     *
     * @authenticated
     * @group User
     */
    public function deleteUser($id)
    {
        return $this->model->deleteData($id);
    }
    /**
     * アクセストークン更新
     *
     * @authenticated
     * @group User
     */
    public function updateAccessToken($id, $request)
    {
        return $this->model->updateData($id, $request);
    }
    /**
     * ユーザー取得（By email）
     *
     * @authenticated
     * @group User
     */
    public function fetchUserByLoginAccount($loginId): ?object
    {
        return $this->model->where('email', $loginId)->first();
    }
    /**
     * ユーザー取得（By id）
     *
     * @authenticated
     * @group User
     */
    public function fetchUserById($id)
    {
        return $this->model->find($id);
    }
    /**
     * 貸船業者 ユーザー情報取得
     *
     * @authenticated
     * @group User
     */
    public function fetchLenderUser($userId)
    {
        return $this->model->leftJoin('lenders', 'users.id', 'lenders.user_id')
                        ->leftJoin('member_types', 'lenders.member_type_id', 'member_types.id')
                        ->leftJoin('prefectures', 'lenders.prefecture_id', 'prefectures.id')
                        ->leftJoin('cities', 'lenders.city_id', 'cities.id')
                        ->leftJoin('ports', 'lenders.port_id', 'ports.id')
                        ->select(
                            'users.id as id',
                            'users.name',
                            'users.name_kana',
                            'users.email',
                            'users.role_id',
                            'users.access_token',
                            'lenders.id as lender_id',
                            'member_types.member_type_name',
                        )->find($userId);
    }
    /**
     * パスワード更新
     *
     * @authenticated
     * @group User
     */
    public function changePassword($request, $id)
    {
        $request = [
            'password' => bcrypt($request['password']),
        ];
        return $this->model->updateData($id, collect($request));
    }
    /**
     * ログイン日時更新
     *
     * @authenticated
     * @group User
     */
    public function updateLoginLog($id)
    {
        $request = [
            'login_app_datetime' => date("Y-m-d H:i:s")
        ];
        return $this->model->updateData($id, collect($request));
    }
}
