<?php

namespace App\Repositories;

use App\Models\LenderPost;
use App\Enums\Util;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LenderPostRepository
{
    protected $model;

    public function __construct(LenderPost $model)
    {
        $this->model = $model;
    }
    /*-------------------------------------------*/
    /* ADMIN/LENDER
    /*-------------------------------------------*/
    /**
     * 釣果情報 一覧取得（ページネーション追加対応のため、リスト取得）
     *
     * @param Request $request
     * @return object
     */
    public function index($lenderId): object
    {
        $query = $this->model->whereNull('lender_posts.deleted_at');

        if ($lenderId !== "null") {
            $query->where('lender_posts.lender_id', $lenderId);
        }
        return $query->orderBy('updated_at', 'desc')->get();
    }
    /**
     * 詳細取得
     *
     * @param int $id
     * @return object
     */
    public function show(int $id): object
    {
        return $this->model
                    ->with('fishingOptions')
                    ->with('targets')
                    ->find($id);
    }
    /**
     * 新規登録
     *
     * @param integer $id
     * @param array $postRequest
     * @return object
     */
    public function store(array $postRequest): object
    {
        return $this->model->storeData(collect($postRequest));
    }
    /**
     * 更新
     *
     * @param integer $id
     * @param array $postRequest
     * @return object
     */
    public function update(int $id, array $postRequest): object
    {
        return $this->model->updateData($id, collect($postRequest));
    }
    public function delete(int $id)
    {
        return $this->model->deleteData($id);
    }
    /*-------------------------------------------*/
    /* VIEWER *認証なし
    /*-------------------------------------------*/
    /**
     * 貸船業者_釣果情報 一覧取得
     */
    public function viewerIndex($lenderId): object
    {
        $query = $this->model
                    ->leftJoin('lender_post_by_fishing_options', 'lender_posts.id', 'lender_post_by_fishing_options.lender_post_id')
                    ->leftJoin('lender_post_by_targets', 'lender_posts.id', 'lender_post_by_targets.lender_post_id')
                    ->leftJoin('fishing_options', 'lender_post_by_fishing_options.fishing_option_id', 'fishing_options.id')
                    ->leftJoin('targets', 'lender_post_by_targets.target_id', 'targets.id')
                    ->select(
                        'lender_posts.id',
                        'lender_posts.title',
                        'lender_posts.comment',
                        'lender_posts.post_img_1',
                        'lender_posts.post_img_2',
                        'lender_posts.post_img_3',
                        'lender_posts.post_img_4',
                        'lender_posts.post_img_5',
                        'lender_posts.created_at',
                        'lender_posts.updated_at',
                        DB::raw('GROUP_CONCAT(distinct(fishing_options.fishing_option_name)) as fishing_option_names'),
                        DB::raw('GROUP_CONCAT(distinct(targets.target_name)) as target_names'),
                    )
                    ->whereNull('lender_posts.deleted_at')
                    ->orderBy('lender_posts.updated_at', 'desc');

        // pagenation 確認のためコメントアウト
        if ($lenderId !== "null" || !empty($lenderId)) {
            $query->where('lender_posts.lender_id', $lenderId);
        }

        return $query->groupBy('lender_posts.id')->paginate(Util::PAGINATE_COUNT_POST);
    }
    /**
     * 貸船業者_釣果情報 リスト取得
     */
    public function viewerList($count): object
    {
        return  $this->model
                    ->with('fishingOptions')
                    ->with('targets')
                    ->with(['lender' => function ($q) {
                        $q->with('city')
                            ->with('boats');
                    }])
                    ->limit($count)
                    // ->orderBy('created_at', 'asc')
                    // ->orderBy('created_at', 'desc')
                    ->get();
    }
}
