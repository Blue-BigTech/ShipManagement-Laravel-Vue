<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MemberTypeService;

class MemberTypeController extends Controller
{
    protected $service;

    public function __construct(MemberTypeService $service)
    {
        $this->service = $service;
    }

    /**
     * 会員タイプ リスト取得
     *
     * @authenticated
     * @group MemberType
     * @param Request $request
     */
    public function fetchMemberTypeList()
    {
        return $this->service->fetchMemberTypeList();
    }
}
