<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\OperationRepository;

class OperationService
{
    protected $repository;

    public function __construct(OperationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 業種 リスト取得
     */
    public function fetchOperationList()
    {
        return $this->repository->fetchOperationList();
    }
}
