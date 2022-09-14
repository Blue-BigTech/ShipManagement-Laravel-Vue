<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\TargetRepository;

class TargetService
{
    protected $repository;

    public function __construct(TargetRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * リスト取得 ターゲット魚種
     *
     * @return object
     */
    public function fetchList(): object
    {
        return $this->repository->fetchList();
    }
}
