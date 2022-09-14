<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\PrefectureRepository;

class PrefectureService
{
    protected $repository;

    public function __construct(PrefectureRepository $repository)
    {
        $this->repository = $repository;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 都道府県 一覧取得
     */
    public function fetchPrefectureIndex($keyword, $sortKey, $orderBy): object
    {
        return $this->repository->fetchPrefectureIndex($keyword, $sortKey, $orderBy);
    }

    /**
     * 都道府県 名前一覧取得
     */
    public function fetchPrefectureList()
    {
        return $this->repository->fetchPrefectureList();
    }

    /**
     * 都道府県 詳細取得
     */
    public function fetchPrefectureShow($id)
    {
        return $this->repository->fetchPrefectureShow($id);
    }

    /**
     * 都道府県 新規登録
     */
    public function storePrefecture($request)
    {
        $prefecture = $this->repository->storePrefecture($request);
        return response()->json($prefecture, HttpStatus::CREATED);
    }

    /**
     * 都道府県 更新取得
     */
    public function updatePrefecture($request, $id)
    {
        $prefecture = $this->repository->updatePrefecture($request, $id);
        return response()->json($prefecture, HttpStatus::OK);
    }

    /**
     * 都道府県 削除
     */
    public function deletePrefecture($id)
    {
        return $this->repository->deletePrefecture($id);
    }

    /**
     * 都道府県、市町村、港 ネスト状態でリスト取得
     */
    public function fetchAreaLists(): object
    {
        return $this->repository->fetchAreaLists();
    }
    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 都道府県 詳細取得
     */
    public function fetchPrefectureWithCityViewer($prefectureParam)
    {
        return $this->repository->fetchPrefectureWithCityByUrlParamViewer($prefectureParam);
    }
}
