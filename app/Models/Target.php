<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    ];

    public function boats()
    {
        return $this->belongsToMany(Boat::class, 'boat_by_targets', 'target_id', 'boat_id');
    }
}
