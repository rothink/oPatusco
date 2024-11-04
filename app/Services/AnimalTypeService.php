<?php

namespace App\Services;


use App\Repositories\AnimalTypeRepository;

class AnimalTypeService extends BaseService
{
    protected $repository;

    public function __construct(AnimalTypeRepository $repository)
    {
        $this->repository = $repository;
    }


    /**
     * @return mixed
     */
    public function preRequisite($id = null)
    {
        $arr['animal_types'] = generateSelectOption($this->repository->list());
        return $arr;
    }
}
