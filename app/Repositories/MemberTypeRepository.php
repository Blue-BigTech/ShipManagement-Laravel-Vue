<?php

namespace App\Repositories;

use App\Models\MemberType;
use Illuminate\Support\Facades\Log;

class MemberTypeRepository
{
    protected $model;

    public function __construct(MemberType $model)
    {
        $this->model = $model;
    }

    /**
     * 会員タイプ リスト取得
     */
    public function fetchMemberTypeList()
    {
        return $this->model->get();
    }
}
