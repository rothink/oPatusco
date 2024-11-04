<?php

namespace App\Repositories;

use App\Enum\EnumRole;
use App\Models\User;

class UserRepository extends BaseRepository
{
    public $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function formatParams(array $params): array
    {
        return [
            'name' => $this->getAttribute($params, 'name'),
            'role' => $this->getAttribute($params, 'role'),
        ];
    }

    /**
     * @param string $sortBy
     * @param string $pluck
     * @return array
     */
    public function list($sortBy = 'name', $pluck = 'name'): array
    {
        return $this
            ->getModel()
            ->where('role', EnumRole::MEDICO->value)
            ->pluck($pluck, 'id')
            ->all();
    }
}
