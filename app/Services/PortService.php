<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\PortRepository;

class PortService
{
    protected $repository;

    public function __construct(PortRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 港 一覧取得
     */
    public function fetchPortIndex($keyword, $sortKey, $orderBy): object
    {
        return $this->repository->fetchPortIndex($keyword, $sortKey, $orderBy);
    }
        /**
     * 港 詳細取得
     */
    public function fetchPortShow($id)
    {
        return $this->repository->fetchPortShow($id);
    }
        /**
     * 港 新規登録
     */
    public function storePort($request)
    {
        $Port = $this->repository->storePort($request);
        return response()->json($Port, HttpStatus::CREATED);
    }

    /**
     * 港 更新取得
     */
    public function updatePort($request, $id)
    {
        $Port = $this->repository->updatePort($request, $id);
        return response()->json($Port, HttpStatus::OK);
    }

    /**
     * 港 削除
     */
    public function deletePort($id)
    {
        return $this->repository->deletePort($id);
    }

}
