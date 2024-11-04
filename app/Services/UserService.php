<?php

namespace App\Services;


use App\Repositories\UserRepository;

class UserService extends BaseService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function preRequisiteMedicos($id = null)
    {
        $arr['medicos'] = generateSelectOption($this->repository->list());
        return $arr;
    }
}
