<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FishingOptionService;

class FishingOptionController extends Controller
{
    protected $service;

    public function __construct(FishingOptionService $service)
    {
        $this->service = $service;
    }

    /**
     * 対応魚種 リスト取得
     *
     * @authenticated
     * @group FishingOption
     */
    public function fetchFishingOptionList()
    {
        return $this->service->fetchFishingOptionList();
    }
}
