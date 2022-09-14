<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Region extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    public function prefectures()
    {
        return $this->hasMany(Prefecture::class);
    }
}
