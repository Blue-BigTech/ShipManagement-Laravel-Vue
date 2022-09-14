<?php

namespace App\Repositories;

use App\Models\aaa;
use Illuminate\Support\Facades\Log;

class aaaRepository
{
    protected $model;

    public function __construct(aaa $model)
    {
        $this->model = $model;
    }

    public function fetchaaaIndex()
    {
        //
    }

    public function fetchaaaList()
    {
        return $this->model->fetchaaaList();
    }

    public function storeaaa($request)
    {
        //
    }

    public function showaaa($id)
    {
        //
    }

    public function updateaaa($request, $id)
    {
        //
    }

    public function destroyaaa($id)
    {
        //
    }
}
