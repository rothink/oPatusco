<?php

namespace App\Services;


use App\Repositories\UserRepository;

class AuthService extends BaseService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }
}
