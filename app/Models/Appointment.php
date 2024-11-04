<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class Appointment extends AbstractModel
{
    use HasFactory;

    protected $appends = ['appointment_date_to_human', 'appointment_date_formated'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function animalType()
    {
        return $this->hasOne(AnimalType::class, 'id', 'animal_type_id');
    }

    public function appointmentDoctor()
    {
        return $this->hasOne(AppointmentDoctor::class, 'appointment_id');
    }

    public function doctor()
    {
        return $this->hasManyThrough(User::class, AppointmentDoctor::class, 'appointment_id', 'id', 'id', 'user_id')
            ->where('role', 'doctor');
    }

    public function getAppointmentDateToHumanAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->appointment_date))->diffForHumans();
    }

    /**
     * @return string
     */
    public function getAppointmentDateFormatedAttribute()
    {
        return Carbon::createFromTimeStamp(strtotime($this->appointment_date))->format('d/m/Y');
    }

    public function scopeQuery(Builder $queryBuilder, $params = []): Builder
    {
        if (Arr::has($params, 'animal_type_id')) {
            $queryBuilder->where('animal_type_id', $params['animal_type_id']);
        }
        if (Arr::has($params, 'appointment_date')) {
            $queryBuilder->where('appointment_date', $params['appointment_date']);
        }
        if (Arr::has($params, 'user_id')) {
            $queryBuilder->where('user_id', $params['user_id']);
        }
        if (Arr::has($params, 'appointmentDoctor.user_id')) {
            $queryBuilder->whereHas('appointmentDoctor', function ($query) use ($params) {
                return $query->where('user_id', $params['appointmentDoctor.user_id']);
            });
        }
        return parent::scopeQuery($queryBuilder, $params);
    }
}
