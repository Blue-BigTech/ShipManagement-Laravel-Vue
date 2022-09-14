<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\FacilityRepository;

class FacilityService
{
    protected $repository;

    public function __construct(FacilityRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetchFacilityIndex()
    {
        //
    }

    public function storeFacility($request)
    {
        //
    }

    public function showFacility($id)
    {
        //
    }

    public function updateFacility($request, $id)
    {
        //
    }

    public function destroyFacility($id)
    {
        //
    }

    /**
     * 船設備 リスト取得
     *
     * @authenticated
     * @group Facility
     */
    public function fetchFacilityList()
    {
        return $this->repository->fetchFacilityList();
    }
}
