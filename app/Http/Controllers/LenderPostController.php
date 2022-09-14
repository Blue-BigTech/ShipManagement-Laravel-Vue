<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use App\Services\LenderPostService;
use App\Services\UtilService;
use App\Http\Requests\LenderPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LenderPostController extends Controller
{
    protected $service;

    public function __construct(LenderPostService $service, UtilService $utilService)
    {
        $this->service = $service;
        $this->utilService = $utilService;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 釣果情報 一覧取得（ページネーション追加対応のため、リスト取得）
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        $lenderId = $request->get('lender_id');
        return $this->service->index($lenderId);
    }
    /**
     * 釣果情報 詳細取得
     *
     * @param int $id
     * @return object
     */
    public function show(int $id): object
    {
        return $this->service->show($id);
    }
    /**
     * 釣果情報 登録
     *
     * @param LenderPostRequest $request
     * @return object
     */
    public function store(LenderPostRequest $request): object
    {
        DB::transaction(function () use ($request) {
            $imageList = $request['image_list'];
            $postRequest = [
                'lender_id' => $request['lender_id'],
                'title' => $request['title'],
                'comment' => $request['comment'],
                'post_img_1' => $imageList[0]['save_path'],
                'post_img_2' => $imageList[1]['save_path'],
                'post_img_3' => $imageList[2]['save_path'],
                'post_img_4' => $imageList[3]['save_path'],
                'post_img_5' => $imageList[4]['save_path'],
                'created_user_id' => $request['created_user_id'],
                'updated_user_id' => $request['updated_user_id'],
            ];
            $fishingOptionIds = $request['selected_fishing_option_ids'];
            $targetIds = $request['selected_target_ids'];
            // 釣果情報、中間テーブル保存
            $this->service->store($postRequest, $fishingOptionIds, $targetIds);
            // 画像保存
            $this->utilService->uploadBase64Images($imageList); // 戻り値なし（logエラー）
        }, config('database.dead_lock_count'));
        return response()->json([], HttpStatus::CREATED);
    }
    /**
     * 釣果情報 更新
     *
     * @param LenderPostRequest $request
     * @param int $id
     * @return object
     */
    public function update(LenderPostRequest $request, int $id): object
    {
        DB::transaction(function () use ($request, $id) {
            $imageList = $request['image_list'];
            $deleteImageList = $request['delete_image_list'];
            $postRequest = [
                'lender_id' => $request['lender_id'],
                'title' => $request['title'],
                'comment' => $request['comment'],
                'post_img_1' => $imageList[0]['save_path'],
                'post_img_2' => $imageList[1]['save_path'],
                'post_img_3' => $imageList[2]['save_path'],
                'post_img_4' => $imageList[3]['save_path'],
                'post_img_5' => $imageList[4]['save_path'],
                'created_user_id' => $request['created_user_id'],
                'updated_user_id' => $request['updated_user_id'],
            ];
            $fishingOptionIds = $request['selected_fishing_option_ids'];
            $targetIds = $request['selected_target_ids'];
            // 釣果情報、中間テーブル保存
            $this->service->update($id, $postRequest, $fishingOptionIds, $targetIds);
            // 画像保存,削除
             $this->utilService->uploadBase64Images($imageList); // 戻り値なし（logエラーは出る）
             $this->utilService->deleteImages($deleteImageList); // 戻り値なし（logエラーは出る）
        }, config('database.dead_lock_count'));
        return response()->json([], HttpStatus::OK);
    }
    /**
     * 削除
     *
     * @param Request $request
     * @param int $id
     * @return object
     */
    public function delete(Request $request, int $id): object
    {
        $deleteImageList = $request['delete_image_list'];
        DB::transaction(function () use ($deleteImageList, $id) {
            $this->service->delete($id);
            $this->utilService->deleteImages($deleteImageList); // 戻り値なし（logエラーは出る）
        }, config('database.dead_lock_count'));
        return response()->json([], HttpStatus::OK);
    }
    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 釣果情報 一覧取得
     *
     * @authenticated
     * @group LenderPost
     * @param Request $request
     */
    public function viewerIndex(Request $request)
    {
        $lenderId = $request->get('lender_id');
        return $this->service->viewerIndex($lenderId);
    }
    /**
     * 釣果情報 リスト取得
     *
     * @authenticated
     * @group LenderPost
     * @param Request $request
     */
    public function viewerList(Request $request)
    {
        $count = $request->get('count');
        return $this->service->viewerList($count);
    }
}
