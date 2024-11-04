<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointmentDoctorFormRequest;
use App\Services\AppointmentDoctorService;
use App\Services\AppointmentService;

class AppointmentDoctorController extends BaseController
{
    /**
     * @var AppointmentService
     */
    protected $service;

//
    /**
     * @var string
     */
    protected string $createRequest = CreateAppointmentDoctorFormRequest::class;

    public function __construct(AppointmentDoctorService $service)
    {
        $this->service = $service;
    }
}
