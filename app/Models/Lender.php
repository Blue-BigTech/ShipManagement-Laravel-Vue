<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lender extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'member_type_id',
        'zip_code',
        'prefecture_id',
        'city_id',
        'address',
        'port_id',
        'map_url',
        'access_example',
        'phone',
        'hp_url',
        'price',
        'parking',
        'permission_img',
        'boat_number',
        'other',
        'created_user_id',
        'updated_user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function boats()
    {
        return $this->hasMany(Boat::class);
    }

    public function lenderPosts()
    {
        return $this->hasMany(LenderPost::class);
    }

    public function paymentOptions()
    {
        return $this->belongsToMany(PaymentOption::class, 'lender_by_payment_options', 'lender_id', 'payment_option_id');
    }

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function port()
    {
        return $this->belongsTo(Port::class);
    }
}
