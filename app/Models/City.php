<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'prefecture_id',
        'city_name',
        'city_name_kana',
        'url_param',
        'comment',
        'create_user_id',
        'updated_user_id',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function ports()
    {
        return $this->hasMany(Port::class);
    }
}
