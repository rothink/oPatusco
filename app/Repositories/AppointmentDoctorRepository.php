<?php

namespace App\Repositories;

use App\Models\AppointmentDoctor;

class AppointmentDoctorRepository extends BaseRepository
{

    public $model;

    public function __construct(AppointmentDoctor $model)
    {
        $this->model = $model;
    }

    public function formatParams(array $params): array
    {
        $formatted = [
            'user_id' => $this->getAttribute($params, 'user_id'),
            'appointment_id' => $this->getAttribute($params, 'appointment_id'),
        ];
        return $formatted;
    }
}
