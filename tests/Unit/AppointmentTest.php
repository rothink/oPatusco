<?php

namespace Tests\Unit;

use App\Models\Appointment;
use App\Models\Author;
use App\Models\Subject;
use App\Models\User;
use App\Services\AuthorService;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AppointmentTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_delete_appointment_exception_when_medico_action(): void
    {
        $user = User::factory()->create(['role' => 'medico']);
        $appointment = Appointment::factory()->create();
        Sanctum::actingAs($user);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Médico veterinário não pode excluir nenhum agendamento');
        $service = app()->make(AppointmentService::class);
        $service->delete($appointment->id);
    }

    public function test_delete_appointment_exception_when_cliente_action(): void
    {
        $user = User::factory()->create();
        $appointment = Appointment::factory()->create();
        Sanctum::actingAs($user);

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Cliente não pode excluir nenhum agendamento');
        $service = app()->make(AppointmentService::class);
        $service->delete($appointment->id);
    }
}
