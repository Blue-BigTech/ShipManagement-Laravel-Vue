<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Port extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'city_id',
        'port_name',
        'port_name_kana',
        'comment',
        'created_user_id',
        'updated_user_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
