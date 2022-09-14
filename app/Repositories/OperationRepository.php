<?php

namespace App\Repositories;

use App\Models\Operation;
use Illuminate\Support\Facades\Log;

class OperationRepository
{
    protected $model;

    public function __construct(Operation $model)
    {
        $this->model = $model;
    }

    /**
     * 業種 リスト取得
     */
    public function fetchOperationList()
    {
        return $this->model->get();
    }
}
