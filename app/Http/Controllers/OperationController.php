<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OperationService;

class OperationController extends Controller
{
    protected $service;

    public function __construct(OperationService $service)
    {
        $this->service = $service;
    }

    /**
     * 業種 リスト取得
     *
     * @authenticated
     * @group Operation
     * @param Request $request
     */
    public function fetchOperationList()
    {
        return $this->service->fetchOperationList();
    }
}
