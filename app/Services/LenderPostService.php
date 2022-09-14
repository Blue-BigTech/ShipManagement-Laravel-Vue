<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\LenderPostRepository;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;

class LenderPostService
{
    protected $repository;

    public function __construct(LenderPostRepository $repository)
    {
        $this->repository = $repository;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 一覧取得（ページネーション追加対応のため、リスト取得）
     *
     * @param integer $lenderId
     * @return object
     */
    public function index(int $lenderId): object
    {
        return $this->repository->index($lenderId);
    }
    /**
     * 詳細取得
     *
     * @param int $id
     * @return object
     */
    public function show(int $id): object
    {
        return $this->repository->show($id);
    }
    /**
     * 保存
     *
     * @param array $postRequest
     * @return void
     */
    public function store(array $postRequest, ?array $fishingOptionIds, ?array $targetIds): void
    {
        DB::transaction(function () use ($postRequest, $fishingOptionIds, $targetIds) {
            // 釣果情報新規登録
            $resLenderPost = $this->repository->store($postRequest);
            // 中間テーブル保存
            $resLenderPost->fishingOptions()->sync($fishingOptionIds);
            $resLenderPost->targets()->sync($targetIds);
        }, config('database.dead_lock_count'));
    }
    /**
     * 更新
     *
     * @param integer $id
     * @param array $postRequest
     * @param array $fishingOptionIds
     * @param array $targetIds
     * @return void
     */
    public function update(int $id, array $postRequest, array  $fishingOptionIds, array $targetIds): void
    {
        DB::transaction(function () use ($id, $postRequest, $fishingOptionIds, $targetIds) {
            // 釣果情報新規登録
            $resLenderPost =  $this->repository->update($id, $postRequest);
            // 中間テーブル保存
            $resLenderPost->fishingOptions()->sync($fishingOptionIds);
            $resLenderPost->targets()->sync($targetIds);
        }, config('database.dead_lock_count'));
    }
    /**
     * 一件削除（関連データ削除）
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id): void
    {
        $this->repository->delete($id);
    }
    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 貸船業者_釣果情報 一覧取得
     */
    public function viewerIndex($lenderId)
    {
        return $this->repository->viewerIndex($lenderId);
    }
    /**
     * 貸船業者_釣果情報 リスト取得
     */
    public function viewerList($count)
    {
        return $this->repository->viewerList($count);
    }
}
