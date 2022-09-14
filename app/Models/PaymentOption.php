<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentOption extends BaseModel
{
    use SoftDeletes, CascadeSoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    ];

    public function lenders()
    {
        return $this->belongsToMany(Lender::class, 'lender_by_payment_options', 'payment_option_id', 'lender_id');
    }
}
