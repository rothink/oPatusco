<?php

namespace App\Repositories;

use App\Models\AnimalType;
use App\Models\Book;

class AnimalTypeRepository extends BaseRepository
{
    public $model;

    public function __construct(AnimalType $model)
    {
        $this->model = $model;
    }

    public function formatParams(array $params): array
    {
        return $params;
    }
}
