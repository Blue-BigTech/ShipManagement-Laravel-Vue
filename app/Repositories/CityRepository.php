<?php

namespace App\Repositories;

use App\Models\City;
use App\Enums\Util;
use Illuminate\Support\Facades\Log;

class CityRepository
{
    protected $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }

    /**
     * 市区町村 一覧取得
     *
     * @authenticated
     * @group City
     * @param Request $request
     */
    public function fetchCityIndex($sortKey, $orderBy, $keyword): object
    {
        $query = $this->model
            ->leftJoin('users as created_user', 'created_user.id', 'cities.created_user_id')
            ->leftJoin('users as updated_user', 'updated_user.id', 'cities.updated_user_id')
            ->whereNull('cities.deleted_at')
            ->select(
                'cities.id',
                'cities.city_name',
                'cities.url_param',
                'cities.comment',
                'cities.created_at',
                'cities.updated_at',
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
                            $q->orWhere('city_name', 'like', $k)
                                ->orWhere('comment', 'like', $k);
                        });
                    }
                }
            });
        }
        return $query->orderby($sortKey, $orderBy)->paginate(Util::PAGINATE_COUNT);
    }

    public function fetchCityList()
    {
        return $this->model->get();
    }

    /**
     * 市区町村 詳細取得
     */
    public function fetchCityShow($id)
    {
        return $this->model->find($id);
    }

    /**
     * 市区町村 新規登録
     */
    public function storeCity($request)
    {
        return $this->model->storeData(collect($request));
    }


    /**
     * 市区町村 更新取得
     */
    public function fetchUpdateCity($request, $id)
    {
        return $this->model->updateData($id, collect($request));
    }

    /**
     * 市町村 市町村 詳細取得（name）
     *
     * @param [type] $cityParam
     * @return void
     */
    public function fetchCityByUrlParam($cityParam)
    {
        return  $this->model->where('url_param', $cityParam)->first();
    }

    /**
     * 市町村 都道府県毎のリスト取得
     *
     * @param integer $id
     * @return void
     */
    public function fetchCityListByPrefecture(int $id)
    {
        return $this->model->where('prefecture_id', $id)->get();
    }
}
