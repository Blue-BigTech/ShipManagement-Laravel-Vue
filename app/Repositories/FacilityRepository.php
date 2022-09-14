<?php

namespace App\Repositories;

use App\Models\Facility;
use Illuminate\Support\Facades\Log;

class FacilityRepository
{
    protected $model;

    public function __construct(Facility $model)
    {
        $this->model = $model;
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
        return $this->model->get();
    }
}
