<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prefecture extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'prefecture_name',
        'prefecture_name_kana',
        'url_param',
        'comment',
        'created_user_id',
        'updated_user_id',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
