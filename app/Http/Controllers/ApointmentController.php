<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAppointmentFormRequest;
use App\Http\Requests\UpdateAppointmentFormRequest;
use App\Services\AppointmentService;

class ApointmentController extends BaseController
{
    /**
     * @var AppointmentService
     */
    protected $service;

    /**
     * @var string
     */
    protected string $createRequest = CreateAppointmentFormRequest::class;

    /**
     * @var string
     */
    protected string $updateRequest = UpdateAppointmentFormRequest::class;

    public function __construct(AppointmentService $service)
    {
        $this->service = $service;
    }
}
