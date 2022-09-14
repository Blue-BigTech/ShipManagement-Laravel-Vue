<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CityService;
use App\Enums\Util;

use Illuminate\Support\Facades\Log;

class CityController extends Controller
{
    protected $service;

    public function __construct(CityService $service)
    {
        $this->service = $service;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
      * 市区町村 一覧取得
      *
      * @authenticated
      * @group City
      * @param Request $request
      */
    public function index(Request $request): object
    {
        $sortKey = $request->get('sort_key');
        $orderBy = $request->get('order_by');
        $keyword = $request->get('keyword');
        return $this->service->fetchCityIndex($sortKey, $orderBy, $keyword);
    }

    /**
     * 市町村区 新規登録
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        return $this->service->storeCity($request);
    }

    /**
     * 市町村 詳細取得
     *
     * @authenticated
     * @group City
     * @param mixed $id
     */
    public function show($id)
    {
        return $this->service->fetchCityShow($id);
    }

    /**
     * 市町村区 更新
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        return $this->service->updateCity($request, $id);
    }

    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 市町村 詳細取得
     *
     * @group City
     * @param mixed $cityName
     */
    public function viewerFetchCityShow($cityParam)
    {
        return $this->service->viewerFetchCityShow($cityParam);
    }
    /**
     * 市区町村 都道府県毎のリスト取得
     *
     * @authenticated
     * @group City
     * @param Request $request
     */
    public function viewerFetchCityListByPrefecture(Request $request)
    {
        $prefectureId = $request->get('prefecture_id');
        return $this->service->viewerFetchCityListByPrefecture($prefectureId);
    }
}
