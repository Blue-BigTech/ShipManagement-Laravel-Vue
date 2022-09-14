<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RegionService;
use App\Http\Requests\RegionRequest;

class RegionController extends Controller
{
    protected $service;

    public function __construct(RegionService $service)
    {
        $this->service = $service;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/

    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 地域 ネスト状態で都道府県取得
     *
     * @authenticated
     * @group Region
     */
    public function fetchRegionWithPrefectureList()
    {
        return $this->service->fetchRegionWithPrefectureList();
    }
}
