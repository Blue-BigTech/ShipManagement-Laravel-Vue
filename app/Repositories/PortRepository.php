<?php

namespace App\Repositories;

use App\Models\Port;
use App\Enums\Util;
use Illuminate\Support\Facades\Log;

class PortRepository
{
    protected $model;

    public function __construct(Port $model)
    {
        $this->model = $model;
    }

    public function fetchPortIndex($keyword, $sortKey, $orderBy): object
    {
        $query = $this->model
            ->leftJoin('cities', 'ports.city_id', 'cities.id')
            ->leftJoin('prefectures', 'cities.prefecture_id', 'prefectures.id')
            ->leftJoin('users as created_user', 'created_user.id', 'ports.created_user_id')
            ->leftJoin('users as updated_user', 'updated_user.id', 'ports.updated_user_id')
            ->whereNull('ports.deleted_at')
            ->select(
                'cities.city_name',
                'cities.url_param',
                'prefectures.prefecture_name',
                'ports.id',
                'ports.port_name',
                'ports.comment',
                'ports.created_at',
                'ports.updated_at',
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
                            $q->orWhere('port_name', 'like', $k)
                                ->orWhere('comment', 'like', $k);
                        });
                    }
                }
            });
        }

        return $query->orderBy($sortKey, $orderBy)->paginate(Util::PAGINATE_COUNT);
        // return $query->paginate(Util::PAGINATE_COUNT);

    }
    public function fetchPortList()
    {
        return $this->model->get();
    }
        /**
     * 港 詳細取得
     */
    public function fetchPortShow($id)
    {
        return $this->model->leftJoin('cities', 'ports.city_id', 'cities.id')->find($id);
    }
    /**
     * 港 新規登録
     */
    public function storePort($request)
    {
        return $this->model->storeData(collect($request));
    }
    /**
     * 港 更新取得
     */
    public function updatePort($request, $id)
    {
        return $this->model->updateData($id, collect($request));
    }

    /**
     * 港 削除
     */
    public function deletePort($id)
    {
        return $this->model->deleteData($id);
    }
    public function showPort($id)
    {
        //
    }
}
