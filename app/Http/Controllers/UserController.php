<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * @var UserService
     */
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function medicos(Request $request)
    {
        return $this->service->preRequisiteMedicos();
    }
}
