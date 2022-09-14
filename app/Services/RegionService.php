<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\RegionRepository;

class RegionService
{
    protected $repository;

    public function __construct(RegionRepository $repository)
    {
        $this->repository = $repository;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/

    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 地域 ネスト状態で都道府県取得
     */
    public function fetchRegionWithPrefectureList()
    {
        return $this->repository->fetchRegionWithPrefectureList();
    }
}
