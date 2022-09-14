<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Repositories\BoatRepository;
use Illuminate\Support\Facades\Log;

class BoatService
{
    protected $repository;

    public function __construct(BoatRepository $repository)
    {
        $this->repository = $repository;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 船 一覧取得
     */
    public function viewerIndex($sortKey, $orderBy, $prefectureParam, $cityParam): object
    {
        return $this->repository->index($sortKey, $orderBy, $prefectureParam, $cityParam);
    }
    /**
     * 船 詳細取得
     */
    public function viewerShow($id): object
    {
        return $this->repository->fetchDetailById($id);
    }
}
