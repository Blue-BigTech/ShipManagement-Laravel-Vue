<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentOptionService;

class PaymentOptionController extends Controller
{
    protected $service;

    public function __construct(PaymentOptionService $service)
    {
        $this->service = $service;
    }

    /**
     * 支払い方法 リスト取得
     *
     * @authenticated
     * @group PaymentOption
     * @param Request $request
     */
    public function fetchPaymentOptionList()
    {
        return $this->service->fetchPaymentOptionList();
    }
}
