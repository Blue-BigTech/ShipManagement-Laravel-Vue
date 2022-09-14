<?php

namespace App\Repositories;

use App\Models\Lender;
use App\Models\Boat;
use App\Models\User;
use App\Enums\Util;
use Illuminate\Support\Facades\DB;

// use PDOException;
// use Illuminate\Support\Facades\Log;

class LenderRepository
{
    protected $model;
    protected $boat;
    protected $user;
    protected $util;

    public function __construct(Lender $model, Boat $boat, User $user)
    {
        $this->model = $model;
        $this->boat = $boat;
        $this->user = $user;
    }
    /**
     * 一覧取得
     *
     * @param string|null $keyword
     * @param string $sortKey
     * @param string $orderBy
     * @return object
     */
    public function fetchLenderWithBoatIndex(?string $keyword, string $sortKey, string $orderBy): object
    {
        // TODO: ->whereNull('users.deleted_at')
        $query = $this->model
            ->leftJoin('users', 'lenders.user_id', 'users.id')
            ->leftJoin('boats', 'lenders.id', 'boats.lender_id')
            ->leftJoin('prefectures', 'lenders.prefecture_id', 'prefectures.id')
            ->leftJoin('cities', 'lenders.city_id', 'cities.id')
            ->leftJoin('ports', 'lenders.port_id', 'ports.id')
            ->leftJoin('users as created_user', 'lenders.created_user_id', 'created_user.id')
            ->leftJoin('users as updated_user', 'lenders.updated_user_id', 'updated_user.id')
            ->whereNull('users.deleted_at')
            ->select(
                'lenders.id',
                'users.name',
                'users.name_kana',
                'prefectures.prefecture_name',
                'cities.city_name',
                'ports.port_name',
                'boats.boat_name',
                'boats.boat_name_kana',
                'lenders.created_at',
                'lenders.updated_at',
                'created_user.name as created_user_name',
                'created_user.name as updated_user_name',
            );

        if ($keyword) {
            $keywordArray = explode(',', $keyword);
            $query = $query->where(function ($query) use ($keywordArray) {
                foreach ($keywordArray as $word) {
                    if (!empty($word)) {
                        $k = '%'.$word.'%';
                        $query->where(function ($q) use ($k) {
                            $q->orWhere('users.name', 'like', $k)
                                ->orWhere('boats.boat_name', 'like', $k);
                        });
                    }
                }
            });
        }
        return $query->orderBy($sortKey, $orderBy)->paginate(Util::PAGINATE_COUNT);
    }
    /**
     * リスト取得
     */
    public function fetchLenderList()
    {
        return $this->model->get();
    }
    /**
     * 貸船業者 新規作成
     */
    public function storeLender($lenderRequest)
    {
        return  $this->model->storeData(collect($lenderRequest));
    }
    /**
     * 貸船業者/船 詳細取得
     */
    public function fetchLenderWithBoatByLenderId($id): object
    {
        return $this->model
                    ->with('user')
                    ->with('paymentOptions')
                    ->with(['boats' => function ($q) {
                        $q->with('facilities')
                            ->with('fishingOptions')
                            ->with('operations')
                            ->with('targets');
                    }])
                    ->find($id);
    }
    /**
     * 貸船業者/船 更新
     */
    public function updateLender($id, $lenderRequest)
    {
        return  $this->model->updateData($id, collect($lenderRequest));
    }
    /**
     * 貸船業者/船 削除
     */
    public function deleteLender($id)
    {
        return $this->model->deleteData($id);
    }
}
