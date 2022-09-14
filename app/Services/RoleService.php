<?php

namespace App\Services;

use App\Enums\HttpStatus;
use App\Repositories\RoleRepository;

class RoleService
{
    protected $repository;

    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function fetchRoleIndex()
    {
        //
    }

    public function fetchRoleList()
    {
        return $this->model->fetchRoleList();
    }

    public function storeRole($request)
    {
        //
    }

    public function showRole($id)
    {
        //
    }

    public function updateRole($request, $id)
    {
        //
    }

    public function destroyRole($id)
    {
        //
    }
}
