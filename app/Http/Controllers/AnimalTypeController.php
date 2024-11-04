<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAnimalTypeFormRequest;
use App\Services\AnimalTypeService;

class AnimalTypeController extends BaseController
{
    /**
     * @var AnimalTypeService
     */
    protected $service;

    /**
     * @var string
     */
    protected string $createRequest = CreateAnimalTypeFormRequest::class;

    public function __construct(AnimalTypeService $service)
    {
        $this->service = $service;
    }
}
