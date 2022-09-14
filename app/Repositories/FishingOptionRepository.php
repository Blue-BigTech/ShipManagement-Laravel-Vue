<?php

namespace App\Repositories;

use App\Models\FishingOption;
use Illuminate\Support\Facades\Log;

class FishingOptionRepository
{
    protected $model;

    public function __construct(FishingOption $model)
    {
        $this->model = $model;
    }

    public function fetchFishingOptionIndex()
    {
        //
    }

    public function storeFishingOption($request)
    {
        //
    }

    public function showFishingOption($id)
    {
        //
    }

    public function updateFishingOption($request, $id)
    {
        //
    }

    public function destroyFishingOption($id)
    {
        //
    }
    /**
     * 対応魚種 リスト取得
     *
     * @authenticated
     * @group FishingOption
     */
    public function fetchFishingOptionList()
    {
        return $this->model->get();
    }
}
