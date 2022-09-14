<?php

namespace App\Repositories;

use App\Models\Boat;
use App\Enums\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BoatRepository
{
    protected $model;

    public function __construct(Boat $model)
    {
        $this->model = $model;
    }

    /**
     * 一覧取得（今はページネーションとか付けてない）
     *
     * @param string|null $sortKey
     * @param string|null $orderBy
     * @param string|null $prefectureParam
     * @param string|null $cityParam
     * @return object
     */
    // 将来必要になるためにおいておく「$sortKey, $orderBy」
    public function index(?string $sortKey, ?string $orderBy, ?string $prefectureParam, ?string $cityParam): object
    {
        $query = $this->model
            ->leftJoin('lenders', 'boats.lender_id', 'lenders.id')
            ->leftJoin('boat_by_operations', 'boats.id', 'boat_by_operations.boat_id')
            ->leftJoin('operations', 'boat_by_operations.operation_id', 'operations.id')
            ->leftJoin('prefectures', 'lenders.prefecture_id', 'prefectures.id')
            ->leftJoin('cities', 'lenders.city_id', 'cities.id')
            ->leftJoin('ports', 'lenders.port_id', 'ports.id')
            ->leftJoin('users as created_user', 'boats.created_user_id', 'created_user.id')
            ->leftJoin('users as updated_user', 'boats.updated_user_id', 'updated_user.id')
            ->whereNull('boats.deleted_at')
            ->select(
                'boats.id',
                'boats.boat_name',
                'boats.caption_comment',
                'boats.fishing_point', // AKI: 釣り方？
                'boats.boat_img_1',
                'boats.created_at',
                'boats.updated_at',
                'lenders.zip_code',
                'lenders.member_type_id',
                'lenders.address',
                'lenders.phone',
                'prefectures.id as prefecture_id',
                'prefectures.prefecture_name',
                'prefectures.comment as prefecture_comment',
                'prefectures.url_param as prefecture_url_param',
                'cities.id as city_id',
                'cities.city_name',
                'cities.comment as city_comment',
                'cities.url_param as city_url_param',
                'ports.id as port_id',
                'ports.port_name',
                'ports.comment as port_comment',
                'created_user.name as created_user_name',
                'created_user.name as updated_user_name',
                DB::raw('GROUP_CONCAT(distinct(operations.operation_name)) as operation_names'),
            );

        if ($prefectureParam !== "null") {
            $query->where('prefectures.url_param', $prefectureParam);
        }

        if ($cityParam !== "null" && $cityParam !== "all") {
            $query->where('cities.url_param', $cityParam);
        }

        return $query->groupBy('boats.id')->paginate(Util::PAGINATE_COUNT_BOAT);
        // return $query->groupBy('boats.id')->orderBy($sortKey, $orderBy)->paginate(Util::PAGINATE_COUNT);
    }

    /**
     * 一件取得
     *
     * @param integer $id
     * @return object
     */
    public function fetchDetailById(int $id): object
    {
        return $this->model
                    ->with('facilities')
                    ->with('fishingOptions')
                    ->with('operations')
                    ->with('targets')
                    ->with(['lender' => function ($q) {
                        $q->with('user')->with('paymentOptions')->with('prefecture')->with('city')->with('port');
                    }])
                    ->find($id);
    }

    /**
     * 新規保存
     *
     * @param array $boatRequest
     * @return object
     */
    public function store(array $boatRequest): object
    {
        return $this->model->storeData(collect($boatRequest));
    }

    /**
     * 更新
     *
     * @param integer $id
     * @param object $boatRequest
     * @return object
     */
    public function update(int $id, object $boatRequest): object
    {
        return $this->model->updateData($id, collect($boatRequest));
    }

    /**
     * 削除
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        return $this->model->deleteData($id);
    }

    /**
     * 貸船業社に紐づく船取得
     *
     * @param integer $id
     * @return object
     */
    public function fetchListByLenderId(int $lenderId): object
    {
        return $this->model->where('lender_id', $lenderId)->whereNull('deleted_at')->get();
    }
}
