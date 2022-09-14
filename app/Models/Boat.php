<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\SeasonType;

class Boat extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id',
        'lender_id',
        'boat_name',
        'boat_name_kana',
        'fishing_area',
        'capacity',
        'departure',
        'fishing_point',
        'tackle',
        'length',
        'weight',
        'caption_comment',
        'boat_img_1',
        'boat_img_2',
        'boat_img_3',
        'boat_img_4',
        'boat_img_5',
        'created_user_id',
        'updated_user_id',
    ];

    public function lender()
    {
        return $this->belongsTo(Lender::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(Facility::class, 'boat_by_facilities', 'boat_id', 'facility_id');
    }

    public function fishingOptions()
    {
        return $this->belongsToMany(FishingOption::class, 'boat_by_fishing_options', 'boat_id', 'fishing_option_id');
    }

    public function operations()
    {
        return $this->belongsToMany(Operation::class, 'boat_by_operations', 'boat_id', 'operation_id');
    }

    public function targets()
    {
        return $this->belongsToMany(Target::class, 'boat_by_targets', 'boat_id', 'target_id')->withPivot(['season_id']);
    }

    public function targetBySeason($seasonType)
    {
        return $this->belongsToMany(Target::class, 'boat_by_targets', 'boat_id', 'target_id')->wherePivot('season_id', $seasonType);
    }
}
