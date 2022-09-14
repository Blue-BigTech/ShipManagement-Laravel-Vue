<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\aaaRepository;

class aaaService
{
    protected $repository;

    public function __construct(aaaRepository $repository)
    {
        $this->repository = $repository;
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
