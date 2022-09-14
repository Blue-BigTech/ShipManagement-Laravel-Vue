<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Enums\SeasonType;
use App\Repositories\LenderRepository;
use App\Repositories\UserRepository;
use App\Repositories\BoatRepository;
use App\Services\UtilService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LenderService
{
    protected $repository;
    protected $userRepository;
    protected $boatRepository;

    public function __construct(LenderRepository $repository, UserRepository $userRepository, BoatRepository $boatRepository, UtilService $util)
    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->boatRepository = $boatRepository;
        $this->utilService = $util;
    }
    /**
     * 貸船業者/船 一覧取得
     *
     * @param ?string $keyword
     * @param string $sortKey
     * @param string $orderBy
     * @return object
     */
    public function fetchLenderWithBoatIndex(?string $keyword, string $sortKey, string $orderBy): object
    {
        return $this->repository->fetchLenderWithBoatIndex($keyword, $sortKey, $orderBy);
    }

    /**
     * 貸船業者 リスト取得
     */
    public function fetchLenderList()
    {
        return $this->repository->fetchLenderList();
    }
    /**
     * 貸船業者/船 新規作成
     *
     * @param array $userRequest
     * @param array $lenderRequest
     * @param array $boatRequest
     * @param ?array $paymentRequest
     * @param ?array $facilityRequest
     * @param ?array $operationRequest
     * @param ?array $fishingOptionRequest
     * @param ?array $targetRequest
     * @return object
     */
    public function storeLenderWithBoat(array $userRequest, array $lenderRequest, array $boatRequest, ?array $paymentRequest, ?array  $facilityRequest, ?array $operationRequest, ?array $fishingOptionRequest, ?array $targetRequest): object
    {
        DB::transaction(function () use ($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest) {
            // ユーザー新規登録
            $userRes = $this->userRepository->storeUser(collect($userRequest));
            $lenderRequest['user_id'] = $userRes['id'];
            // 貸船業者新規登録
            $lenderRes = $this->repository->storeLender($lenderRequest);
            $boatRequest['lender_id'] = $lenderRes['id'];
            // 船新規登録
            $boatRes = $this->boatRepository->store($boatRequest);
            // 中間テーブル保存
            $lenderRes->paymentOptions()->sync($paymentRequest);
            $boatRes->facilities()->sync($facilityRequest);
            $boatRes->fishingOptions()->sync($fishingOptionRequest);
            $boatRes->operations()->sync($operationRequest);
            $boatRes->targetBySeason(SeasonType::SPRING)->syncWithPivotValues($targetRequest['spring'], ['season_id'=> SeasonType::SPRING]);
            $boatRes->targetBySeason(SeasonType::SUMMER)->syncWithPivotValues($targetRequest['summer'], ['season_id'=> SeasonType::SUMMER]);
            $boatRes->targetBySeason(SeasonType::AUTUMN)->syncWithPivotValues($targetRequest['autumn'], ['season_id'=> SeasonType::AUTUMN]);
            $boatRes->targetBySeason(SeasonType::WINTER)->syncWithPivotValues($targetRequest['winter'], ['season_id'=> SeasonType::WINTER]);
        }, config('database.dead_lock_count'));
        return response()->json([], HttpStatus::CREATED);
    }
    /**
     * 貸船業者/船 詳細取得
     *
     * @param int $id
     * @return object
     */
    public function fetchLenderWithBoat($id): object
    {
        return $this->repository->fetchLenderWithBoatByLenderId($id);
    }
    /**
     * 貸船業者/船 更新
     *
     * @param array $userRequest
     * @param array $lenderRequest
     * @param array $boatRequest
     * @param ?array $paymentRequest
     * @param ?array $facilityRequest
     * @param ?array $operationRequest
     * @param ?array $fishingOptionRequest
     * @param ?array $targetRequest
     * @param ?array $imageDeleteRequest
     * @param int $id
     * @return void
     */
    public function updateWithBoat($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest, $id): void
    {
        DB::transaction(function () use ($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest, $id) {
            $userId = $userRequest['id'];
            $boatId = $boatRequest['id'];

            $this->userRepository->updateUser($userId, $userRequest);
            $lenderRes = $this->repository->updateLender($id, $lenderRequest);
            $boatRes = $this->boatRepository->update($boatId, collect($boatRequest));
            // 中間テーブル保存
            $lenderRes->paymentOptions()->sync($paymentRequest);
            $boatRes->facilities()->sync($facilityRequest);
            $boatRes->fishingOptions()->sync($fishingOptionRequest);
            $boatRes->operations()->sync($operationRequest);
            $boatRes->targetBySeason(SeasonType::SPRING)->syncWithPivotValues($targetRequest['spring'], ['season_id'=> SeasonType::SPRING]);
            $boatRes->targetBySeason(SeasonType::SUMMER)->syncWithPivotValues($targetRequest['summer'], ['season_id'=> SeasonType::SUMMER]);
            $boatRes->targetBySeason(SeasonType::AUTUMN)->syncWithPivotValues($targetRequest['autumn'], ['season_id'=> SeasonType::AUTUMN]);
            $boatRes->targetBySeason(SeasonType::WINTER)->syncWithPivotValues($targetRequest['winter'], ['season_id'=> SeasonType::WINTER]);
        // 詳細取得
            // $this->repository->fetchLenderWithBoatByLenderId($id);
        }, config('database.dead_lock_count'));
        // return response()->json([], HttpStatus::OK);
    }
    /**
     * 貸船業者/船 削除
     *
     * @param int $id
     * @return void
     */
    public function deleteLenderAndRelatedData($id)
    {
        // return $this->repository->deleteLenderAndBoat($id);
        $result = DB::transaction(function () use ($id) {
            $lender = DB::table('lenders')
                        ->leftJoin('boats', 'lenders.id', 'boats.lender_id')
                        ->select(
                            'lenders.id',
                            'lenders.user_id',
                            'boats.id as boat_id'
                        )
                        ->where('lenders.id', $id)->first();
            $userId = $lender->user_id;
            $boatId = $lender->boat_id; // boatが1つの時しか考慮してない
            // 3つのレコードを論理削除
            $this->repository->deleteLender($id);
            $this->userRepository->deleteUser($userId);
            $this->boatRepository->delete($boatId);
        });
        return $result;
    }
}
