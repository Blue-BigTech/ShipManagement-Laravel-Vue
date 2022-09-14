<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\PaymentOptionRepository;

class PaymentOptionService
{
    protected $repository;

    public function __construct(PaymentOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetchPaymentOptionIndex()
    {
        //
    }

    public function fetchPaymentOptionList()
    {
        return $this->repository->fetchPaymentOptionList();
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
