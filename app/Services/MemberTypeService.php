<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\MemberTypeRepository;

class MemberTypeService
{
    protected $repository;

    public function __construct(MemberTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 都道府県 リスト取得
     */
    public function fetchMemberTypeList()
    {
        return $this->repository->fetchMemberTypeList();
    }
}
