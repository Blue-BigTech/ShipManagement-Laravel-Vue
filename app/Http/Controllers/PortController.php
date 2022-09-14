<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PortService;
use App\Http\Requests\PortRequest;
use Illuminate\Support\Facades\Log;

class PortController extends Controller
{
    protected $service;

    public function __construct(PortService $service)
    {
        $this->service = $service;
    }

    /**
    * 港 一覧取得
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

        Log::info($request);

        return $this->service->fetchPortIndex($keyword, $sortKey, $orderBy);
    }
        /**
     * 港 詳細取得
     *
     * @authenticated
     * @group Prefecture
     * @param mixed $id
     */
    public function show($id)
    {
        return $this->service->fetchPortShow($id);
    }

        /**
     * 港 新規登録
     *
     * @authenticated
     * @group Port
     * @param PortRequest $request
     */
    public function store(PortRequest $request)
    {
        return $this->service->storePort($request);
    }

    /**
     * 港 更新
     *
     * @authenticated
     * @group Prefecture
     * @param PortRequest $request
     * @param mixed $id
     */
    public function update(PortRequest $request, $id)
    {
        return $this->service->updatePort($request, $id);
    }

        /**
     * 港 削除
     *
     * @authenticated
     * @group Prefecture
     * @param mixed $id
     */
    public function destroy($id)
    {
        return $this->service->deletePort($id);
    }
}
