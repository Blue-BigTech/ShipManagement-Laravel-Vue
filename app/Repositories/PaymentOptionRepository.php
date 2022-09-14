<?php

namespace App\Repositories;

use App\Models\PaymentOption;
use Illuminate\Support\Facades\Log;

class PaymentOptionRepository
{
    protected $model;

    public function __construct(PaymentOption $model)
    {
        $this->model = $model;
    }

    public function fetchPaymentOptionIndex()
    {
        //
    }

    public function fetchPaymentOptionList()
    {
        return $this->model->get();
    }

    public function storePaymentOption($request)
    {
        //
    }

    public function showPaymentOption($id)
    {
        //
    }

    public function updatePaymentOption($request, $id)
    {
        //
    }

    public function destroyPaymentOption($id)
    {
        //
    }
}
