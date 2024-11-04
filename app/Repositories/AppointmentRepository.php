<?php

namespace App\Repositories;

use App\Enum\EnumRole;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentRepository extends BaseRepository
{

    public $model;

    public function __construct(Appointment $model)
    {
        $this->model = $model;
    }

    public function getAll($params = null, ?array $with = [], string $orderBy = 'id'): mixed
    {
        $user = Auth::user();
        if ($user->role === EnumRole::MEDICO->value) {
            $params['appointmentDoctor.user_id'] = $user->id;
            return parent::getAll($params, $with);
        }
        if ($user->role === EnumRole::CLIENTE->value) {
            $params['user_id'] = $user->id;
            return parent::getAll($params, $with);
        }
        return parent::getAll($params, $with, $orderBy);
    }

    public function formatParams(array $params): array
    {
        $formatted = [
            'user_id' => $this->getAttribute($params, 'user_id'),
            'animal_name' => $this->getAttribute($params, 'animal_name'),
            'animal_type_id' => $this->getAttribute($params, 'animal_type_id'),
            'animal_age' => $this->getAttribute($params, 'animal_age'),
            'symptoms' => $this->getAttribute($params, 'symptoms'),
            'appointment_date' => $this->getAttribute($params, 'appointment_date'),
            'appointment_period' => $this->getAttribute($params, 'appointment_period'),
        ];
        return $formatted;
    }
}
