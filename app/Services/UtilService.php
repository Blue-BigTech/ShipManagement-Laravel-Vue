<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class UtilService
{
    // public function uploadImages($imageStoreRequest)
    // {
    //     foreach ($imageStoreRequest as $columnName => $storeImage) {
    //         $file = $storeImage['file'];
    //         $extension = $file->extension();

    //         $fileName = time() . '_' .  $columnName .'.' . $extension;
    //         request()->file->storeAs('public', $fileName);
    //         // $boatRequest[$columnName] = 'storage/' . $fileName;
    //     }
    // }

    // public function uploadImages($imageStoreRequest)
    // {
    //     foreach ($imageStoreRequest as $columnName => $storeImage) {
    //         $file = $storeImage['file'];
    //         $extension = $file->extension();

    //         $fileName = time() . '_' .  $columnName .'.' . $extension;
    //         request()->file->storeAs('public', $fileName);
    //         // $boatRequest[$columnName] = 'storage/' . $fileName;
    //     }
    // }
    // public function deleteImages($imageDeleteRequest)
    // {
    //     foreach ($imageDeleteRequest as $imagePath) {
    //         // boat_imgフォルダ
    //         if (preg_match('/boat_img/', $imagePath)) {
    //             $fileName = str_replace('storage/boat_images/', '', $imagePath);
    //             Storage::disk('boat_img_uploads')->delete($fileName);
    //         }
    //         // permission_imgフォルダ
    //         if (preg_match('/permission_img/', $imagePath)) {
    //             $fileName = str_replace('storage/permission_images/', '', $imagePath);
    //             Storage::disk('permission_img_uploads')->delete($fileName);
    //         }
    //     }
    // }

    /**
     * 画像をフォルダから削除
     *
     * @param ?array $deleteImageList // 配列以外で来ることないけど...
     * @return void
     */
    public function deleteImages(?array $deleteImageList): void
    {
        if (count($deleteImageList) === 0 || !$deleteImageList) {
            return;
        }
        foreach ($deleteImageList as $imageObj) {
            if ($imageObj['save_path']) {
                $deleteDirectory = str_replace('/storage/images/', '', $imageObj['save_path']);
                Storage::disk("images")->delete($deleteDirectory);
            }
        }
    }
    /**
     * 画像アップロード
     *
     * @param array $imageList
     * @return void
     */
    public function uploadBase64Images(array $imageList): void
    {
        foreach ($imageList as $imageObj) {
            // base64の場合（まだuploadされていない場合）のみuploadを行う
            if (preg_match('/^data:image.*base64,/', $imageObj['image_src'])) {
                $uploadDirectory = str_replace('/storage/images/', '', $imageObj['save_path']);
                $base64 = preg_replace('/^data:image.*base64,/', '', $imageObj['image_src']);
                $base64 = str_replace(' ', '+', $base64);
                $fileData = base64_decode($base64);
                Storage::disk("images")->put($uploadDirectory, $fileData); // 補足：成功時戻り値なし。失敗時未検証。
            }
        }
    }
}
