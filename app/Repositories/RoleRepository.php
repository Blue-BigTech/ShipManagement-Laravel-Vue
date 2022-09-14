<?php

namespace App\Repositories;

use App\Models\Role;
use Illuminate\Support\Facades\Log;

class RoleRepository
{
    protected $model;

    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function fetchRoleIndex()
    {
        //
    }

    public function fetchRoleList()
    {
        return $this->model->get();
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
