<?php

namespace App\Repositories;

use App\Models\Prefecture;
use App\Enums\Util;
use Illuminate\Support\Facades\Log;

class PrefectureRepository
{
    protected $model;

    public function __construct(Prefecture $model)
    {
        $this->model = $model;
    }
    /*-------------------------------------------*/
    /* ＊ Repositoryはauthに関わらず呼び出せるようにするので、管理者・閲覧者の区別をなくす。
    /*-------------------------------------------*/
    /**
     * 都道府県 一覧取得
     */
    public function fetchPrefectureIndex($keyword, $sortKey, $orderBy): object
    {
        $query = $this->model
            ->leftJoin('regions', 'prefectures.region_id', 'regions.id')
            ->leftJoin('users as created_user', 'created_user.id', 'prefectures.created_user_id')
            ->leftJoin('users as updated_user', 'updated_user.id', 'prefectures.updated_user_id')
            ->whereNull('prefectures.deleted_at')
            ->select(
                'regions.region_name',
                'prefectures.id',
                'prefectures.prefecture_name',
                'prefectures.comment',
                'prefectures.created_at',
                'prefectures.updated_at',
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
                            $q->orWhere('prefecture_name', 'like', $k)
                                ->orWhere('comment', 'like', $k);
                        });
                    }
                }
            });
        }

        return $query->orderBy($sortKey, $orderBy)->paginate(Util::PAGINATE_COUNT);
    }

    /**
     * 都道府県 名前一覧取得
     */
    public function fetchPrefectureList()
    {
        return $this->model->get();
    }

    /**
     * 都道府県 詳細取得
     */
    public function fetchPrefectureShow($id)
    {
        return $this->model->find($id);
    }

    /**
     * 都道府県 新規登録
     */
    public function storePrefecture($request)
    {
        return $this->model->storeData(collect($request));
    }

    /**
     * 都道府県 更新取得
     */
    public function updatePrefecture($request, $id)
    {
        return $this->model->updateData($id, collect($request));
    }

    /**
     * 都道府県 削除
     */
    public function deletePrefecture($id)
    {
        return $this->model->deleteData($id);
    }

    /**
     * 都道府県、市町村、港 ネスト状態でリスト取得
     */
    public function fetchAreaLists()
    {
        return $this->model->with('cities.ports')->get();
    }

    /**
     * 都道府県 詳細取得
     */
    public function fetchPrefectureWithCityByUrlParamViewer($prefectureParam)
    {
        $prefecture = $this->model->where('url_param', $prefectureParam)->first();
        return $this->model->with('cities')->find($prefecture->id);
    }
}
