<?php

namespace App\Http\Controllers;

use App\Services\TargetService;

class TargetController extends Controller
{
    protected $service;

    public function __construct(TargetService $service)
    {
        $this->service = $service;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * リスト取得 ターゲット魚種
     *
     * @return array
     */
    public function fetchList()
    {
        return $this->service->fetchList();
    }
}
