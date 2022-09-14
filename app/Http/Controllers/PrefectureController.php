<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PrefectureService;
use App\Http\Requests\PrefectureRequest;
use Illuminate\Support\Facades\Log;


class PrefectureController extends Controller
{
    protected $service;

    public function __construct(PrefectureService $service)
    {
        $this->service = $service;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 都道府県 一覧取得
     *
     * @authenticated
     * @group Prefecture
     * @param Request $request
     */
    public function index(Request $request): object
    {
        $keyword = $request->get('keyword');
        $sortKey = $request->get('sort_key');
        $orderBy = $request->get('order_by');
        return $this->service->fetchPrefectureIndex($keyword, $sortKey, $orderBy);
    }

    /**
     * 都道府県 名前一覧取得
     *
     * @authenticated
     * @group Prefecture
     */
    public function fetchPrefectureList()
    {
        return $this->service->fetchPrefectureList();
    }

    /**
     * 都道府県 詳細取得
     *
     * @authenticated
     * @group Prefecture
     * @param mixed $id
     */
    public function show($id)
    {
        return $this->service->fetchPrefectureShow($id);
    }

    /**
     * 都道府県 新規登録
     *
     * @authenticated
     * @group Prefecture
     * @param PrefectureRequest $request
     */
    public function store(PrefectureRequest $request)
    {
        return $this->service->storePrefecture($request);
    }

    /**
     * 都道府県 更新
     *
     * @authenticated
     * @group Prefecture
     * @param PrefectureRequest $request
     * @param mixed $id
     */
    public function update(PrefectureRequest $request, $id)
    {
        return $this->service->updatePrefecture($request, $id);
    }

    /**
     * 都道府県 削除
     *
     * @authenticated
     * @group Prefecture
     * @param mixed $id
     */
    public function destroy($id)
    {
        return $this->service->deletePrefecture($id);
    }

    /**
     * 都道府県、市町村、港 ネスト状態でリスト取得
     *
     * @authenticated
     * @group Prefecture
     */
    public function fetchAreaLists(): object
    {
        return $this->service->fetchAreaLists();
    }

    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 都道府県 詳細取得
     *
     * @group Prefecture
     * @param mixed $prefectureName
     */
    public function fetchPrefectureWithCityViewer($prefectureParam)
    {
        return $this->service->fetchPrefectureWithCityViewer($prefectureParam);
    }
}
