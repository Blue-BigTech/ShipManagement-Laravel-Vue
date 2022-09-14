<?php

namespace App\Http\Controllers;

use App\Enums\HttpStatus;
use Illuminate\Http\Request;
use App\Services\LenderService;
use App\Services\UtilService;
use App\Http\Requests\LenderRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LenderController extends Controller
{
    protected $service;

    public function __construct(LenderService $service, UtilService $utilService)
    {
        $this->service = $service;
        $this->utilService = $utilService;
    }


    /**
     * 貸船業者 一覧取得
     *
     * @authenticated
     * @group Lender
     * @param Request $request
     * @return object
     */
    public function index(Request $request): object
    {
        $keyword = $request->get('keyword');
        $sortKey = $request->get('sort_key');
        $orderBy = $request->get('order_by');
        return $this->service->fetchLenderWithBoatIndex($keyword, $sortKey, $orderBy);
    }

    /**
     * 貸船業者/船 新規作成
     *
     * @authenticated
     * @group Lender
     * @param LenderRequest $request
     */
    public function store(LenderRequest $request)
    {
        $boatImageList = $request['boat_image_list'];
        $permissionImageList = $request['permission_image_list'];

        $userRequest = [
            // 'password' => bcrypt($request['password']),
            'password' => Hash::make($request['user']['password']),
            'email' => $request['user']['email'],
            'name' => $request['user']['name'],
            'name_kana' => $request['user']['name_kana'],
            'role_id' => $request['user']['role_id'],
            'created_user_id' => $request['created_user_id'],
            'updated_user_id' => $request['updated_user_id'],
        ];
        $lenderRequest = [
            'member_type_id' => $request['member_type_id'],
            'zip_code'  => $request['zip_code'],
            'prefecture_id'  => $request['prefecture_id'],
            'city_id'  => $request['city_id'],
            'address'  => $request['address'],
            'port_id'  => $request['port_id'],
            'map_url'  => $request['map_url'],
            'access_example'  => $request['access_example'],
            'phone'  => $request['phone'],
            'hp_url'  => $request['hp_url'],
            'price'  => $request['price'],
            'parking'  => $request['parking'],
            'permission_img'  => $permissionImageList[0]['save_path'],
            // 'permission_img'  => 'storage/images/dummy/dummy.png',
            'boat_number'  => $request['boat_number'],
            'other'  => $request['other'],
            'created_user_id' => $request['created_user_id'],
            'updated_user_id' => $request['updated_user_id'],
        ];
        $boatRequest = [
            'boat_name'  => $request['boats'][0]['boat_name'],
            'boat_name_kana'  => $request['boats'][0]['boat_name_kana'],
            'fishing_area'  => $request['boats'][0]['fishing_area'],
            'capacity'  => $request['boats'][0]['capacity'],
            'departure'  => $request['boats'][0]['departure'],
            'fishing_point'  => $request['boats'][0]['fishing_point'],
            'tackle'  => $request['boats'][0]['tackle'],
            'length'  => $request['boats'][0]['length'],
            'weight'  => $request['boats'][0]['weight'],
            'caption_comment'  => $request['boats'][0]['caption_comment'],
            'boat_img_1'  => $boatImageList[0]['save_path'],
            // 'boat_img_1'  => 'storage/images/dummy/dummy.png',
            'boat_img_2'  => $boatImageList[1]['save_path'],
            'boat_img_3'  => $boatImageList[2]['save_path'],
            'boat_img_4'  => $boatImageList[3]['save_path'],
            'boat_img_5'  => $boatImageList[4]['save_path'],
            'created_user_id' => $request['created_user_id'],
            'updated_user_id' => $request['updated_user_id'],
        ];
        $paymentRequest = $request['payment_option_ids'];
        $facilityRequest = $request['facility_ids'];
        $fishingOptionRequest = $request['fishing_option_ids'];
        $operationRequest = $request['operation_ids'];
        $targetRequest = $request['targets'];

        DB::transaction(function () use ($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest, $boatImageList, $permissionImageList) {
            // 貸船業者.船新規登録
            $this->service->storeLenderWithBoat($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest);
            // 画像アップロード
            $this->utilService->uploadBase64Images($boatImageList); // 戻り値なし（logエラー）
            $this->utilService->uploadBase64Images($permissionImageList); // 戻り値なし（logエラー）
        }, config('database.dead_lock_count'));
        return response()->json([], HttpStatus::CREATED);
    }

    /**
     * 貸船業者/船 詳細取得
     *
     * @authenticated
     * @group Lender
     * @param  int  $id
     */
    public function show($id): object
    {
        return $this->service->fetchLenderWithBoat($id);
    }

    /**
     * 貸船業者/船 更新
     *
     * @authenticated
     * @group Lender
     * @param LenderRequest $request
     * @param  int  $id
     */
    public function update(LenderRequest $request, $id): object
    {
        $boatImageList = $request['boat_image_list'];
        $boatDeleteImageList = $request['boat_delete_image_list'];
        $permissionImageList = $request['permission_image_list'];
        $permissionDeleteImageList = $request['permission_delete_image_list'];

        $userRequest = [
            'id' => $request['user']['id'],
            'email' => $request['user']['email'],
            'name' => $request['user']['name'],
            'name_kana' => $request['user']['name_kana'],
            'role_id' => $request['user']['role_id'],
            'updated_user_id' => $request['user']['updated_user_id'],
        ];
        $lenderRequest = [
            'user_id' => $request['user_id'],
            'member_type_id' => $request['member_type_id'],
            'zip_code'  => $request['zip_code'],
            'prefecture_id'  => $request['prefecture_id'],
            'city_id'  => $request['city_id'],
            'address'  => $request['address'],
            'port_id'  => $request['port_id'],
            'map_url'  => $request['map_url'],
            'access_example'  => $request['access_example'],
            'phone'  => $request['phone'],
            'hp_url'  => $request['hp_url'],
            'price'  => $request['price'],
            'parking'  => $request['parking'],
            'permission_img'  => $permissionImageList[0]['save_path'],
            'boat_number'  => $request['boat_number'],
            'other'  => $request['other'],
            'updated_user_id'  => $request['updated_user_id'],
        ];
        $boatRequest = [
            'id' => $request['boats'][0]['id'],
            'lender_id'  => $id,
            'boat_name'  => $request['boats'][0]['boat_name'],
            'boat_name_kana'  => $request['boats'][0]['boat_name_kana'],
            'fishing_area'  => $request['boats'][0]['fishing_area'],
            'capacity'  => $request['boats'][0]['capacity'],
            'departure'  => $request['boats'][0]['departure'],
            'fishing_point'  => $request['boats'][0]['fishing_point'],
            'tackle'  => $request['boats'][0]['tackle'],
            'length'  => $request['boats'][0]['length'],
            'weight'  => $request['boats'][0]['weight'],
            'caption_comment'  => $request['boats'][0]['caption_comment'],
            'boat_img_1'  => $boatImageList[0]['save_path'],
            'boat_img_2'  => $boatImageList[1]['save_path'],
            'boat_img_3'  => $boatImageList[2]['save_path'],
            'boat_img_4'  => $boatImageList[3]['save_path'],
            'boat_img_5'  => $boatImageList[4]['save_path'],
            'updated_user_id'  =>$request['updated_user_id'],
        ];
        $paymentRequest = $request['payment_option_ids'];
        $facilityRequest = $request['facility_ids'];
        $fishingOptionRequest = $request['fishing_option_ids'];
        $operationRequest = $request['operation_ids'];
        $targetRequest = $request['targets'];

        DB::transaction(function () use ($id, $userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest, $boatImageList, $boatDeleteImageList, $permissionImageList, $permissionDeleteImageList) {
            // 貸船業者.船更新
            $this->service->updateWithBoat($userRequest, $lenderRequest, $boatRequest, $paymentRequest, $facilityRequest, $operationRequest, $fishingOptionRequest, $targetRequest, $id);
            // 画像アップロード
            $this->utilService->uploadBase64Images($boatImageList); // 戻り値なし（logエラー）
            $this->utilService->uploadBase64Images($permissionImageList); // 戻り値なし（logエラー）
            $this->utilService->deleteImages($boatDeleteImageList); // 戻り値なし（logエラーは出る）
            $this->utilService->deleteImages($permissionDeleteImageList); // 戻り値なし（logエラーは出る）
        }, config('database.dead_lock_count'));

        return response()->json([], HttpStatus::OK);
    }

    /**
     * 貸船業者/船 削除
     *
     * @authenticated
     * @group Lender
     * @param  int  $id
     */
    public function destroy($id)
    {
        return $this->service->deleteLenderAndRelatedData($id);
    }
}
