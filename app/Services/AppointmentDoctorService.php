<?php

namespace App\Services;


use App\Repositories\AppointmentDoctorRepository;

class AppointmentDoctorService extends BaseService
{
    protected $repository;

    public function __construct(AppointmentDoctorRepository $repository)
    {
        $this->repository = $repository;
    }
}
