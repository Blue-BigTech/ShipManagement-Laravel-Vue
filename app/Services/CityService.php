<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\CityRepository;
use Illuminate\Support\Facades\Log;

class CityService
{
    protected $repository;

    public function __construct(CityRepository $repository)
    {
        $this->repository = $repository;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 市区町村 一覧取得
     */
    public function fetchCityIndex($sortKey, $orderBy, $keyword)
    {
        return $this->repository->fetchCityIndex($sortKey, $orderBy, $keyword);
    }

    /**
     * 市区町村 新規登録
     */
    public function storeCity($request)
    {
        $city = $this->repository->storeCity($request);
        return response()->json($city, HttpStatus::CREATED);
    }

    /**
     * 市町村区 詳細取得
     */
    public function fetchCityShow($id)
    {
        return $this->repository->fetchCityShow($id);
    }

    /**
     * 市町村区 更新
     */
    public function updateCity($id, $request)
    {
        return $this->repository->fetchUpdateCity($id, $request);
    }

    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 市町村 詳細取得（name）
     */
    public function viewerFetchCityShow($cityParam)
    {
        return $this->repository->fetchCityByUrlParam($cityParam);
    }
    /**
     * 市町村 都道府県毎のリスト取得
     */
    public function viewerFetchCityListByPrefecture($id)
    {
        return $this->repository->fetchCityListByPrefecture($id);
    }
}
