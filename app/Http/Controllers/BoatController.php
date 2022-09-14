<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BoatService;
use Illuminate\Support\Facades\Log;

class BoatController extends Controller
{
    protected $service;

    public function __construct(BoatService $service)
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
     * 船 一覧取得
     *
     * @group Boat
     * @param Request $request
     */
    public function viewerIndex(Request $request): object
    {
        $sortKey = $request->get('sort_key');
        $orderBy = $request->get('order_by');
        $prefectureParam = $request->get('prefecture_param');
        $cityParam = $request->get('city_param');
        return $this->service->viewerIndex($sortKey, $orderBy, $prefectureParam, $cityParam);
    }
    /**
     * 船 詳細取得
     *
     * @group Boat
     * @param mixed $id
     */
    public function viewerShow($id)
    {
        return $this->service->viewerShow($id);
    }
}
