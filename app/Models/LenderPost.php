<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class LenderPost extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'lender_id',
        'title',
        'comment',
        'post_img_1',
        'post_img_2',
        'post_img_3',
        'post_img_4',
        'post_img_5',
        'created_user_id',
        'updated_user_id',
    ];

    public function lender()
    {
        return $this->belongsTo(Lender::class);
    }

    public function fishingOptions()
    {
        return $this->belongsToMany(FishingOption::class, 'lender_post_by_fishing_options', 'lender_post_id', 'fishing_option_id');
    }

    public function targets()
    {
        return $this->belongsToMany(Target::class, 'lender_post_by_targets', 'lender_post_id', 'target_id');
    }

    public function lenderPostByFishingOptions()
    {
        return $this->hasMany(LenderPostByFishingOption::class);
    }

    public function lenderPostByTargets()
    {
        return $this->hasMany(LenderPostByTarget::class);
    }

    // モデルの初期起動時に実行されるメソッド
    public static function booted()
    {
        parent::boot();
        // see：https://readouble.com/laravel/8.x/ja/eloquent.html
        static::deleted(function ($lenderPost) {
            // \Log::info('通ってる');
            // \Log::info($lenderPost);
            // $fishingOptions = $lenderPost->lenderPostByFishingOptions()->get();
            // \Log::info($fishingOptions);
            // foreach ($fishingOptions as $fishingOption) {
            //     $fishingOption->delete();
            // }
            // $targets = $lenderPost->lenderPostByTargets()->get();
            // foreach ($targets as $target) {
            //     $target->delete();
            // }

            $lenderPost->lenderPostByFishingOptions()->delete();
            $lenderPost->lenderPostByTargets()->delete();
            // foreach ($lenderPost->fishingOptions()->get() as $fishingOption) {
            //     $fishingOption->delete();
            // }
            // foreach ($lenderPost->targets()->get() as $target) {
            //     $target->delete();
            // }
        });
    }
}
