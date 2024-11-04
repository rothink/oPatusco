<?php

namespace App\Services;


use App\Repositories\AnimalTypeRepository;
use Illuminate\Support\Facades\Cache;

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
        $list = Cache::remember('list_cache_key', 60, function () {
            return $this->repository->list();
        });
        $arr['animal_types'] = generateSelectOption($list);
        return $arr;
    }
}
