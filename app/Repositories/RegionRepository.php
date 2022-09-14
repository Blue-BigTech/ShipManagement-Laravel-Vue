<?php

namespace App\Repositories;

use App\Models\Region;
use App\Enums\Util;
use Illuminate\Support\Facades\Log;

class RegionRepository
{
    protected $model;

    public function __construct(Region $model)
    {
        $this->model = $model;
    }
    /*-------------------------------------------*/
    /* ＊ Repositoryはauthに関わらず呼び出せるようにするので、管理者・閲覧者の区別をなくす。
    /*-------------------------------------------*/

    /**
     * 地域 ネスト状態で都道府県取得
     */
    public function fetchRegionWithPrefectureList()
    {
        return $this->model->with('prefectures')->get();
    }
}
