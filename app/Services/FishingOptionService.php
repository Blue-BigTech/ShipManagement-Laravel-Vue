<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\FishingOptionRepository;

class FishingOptionService
{
    protected $repository;

    public function __construct(FishingOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 対応魚種 リスト取得
     *
     * @authenticated
     * @group FishingOption
     */
    public function fetchFishingOptionList()
    {
        return $this->repository->fetchFishingOptionList();
    }
}
