<?php

namespace App\Repositories;

use App\Models\Target;
use Illuminate\Support\Facades\Log;

class TargetRepository
{
    protected $model;

    public function __construct(Target $model)
    {
        $this->model = $model;
    }

    /**
     * リスト取得 ターゲット魚種
     *
     * @return object
     */
    public function fetchList(): object
    {
        return $this->model->get();
    }
}
