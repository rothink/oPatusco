<?php

namespace Tests\Feature;

use App\Models\Appointment;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;


class AppointmentDoctorTest extends TestCase
{
    protected $prefixUrl = '/api/appointments-doctor/';

    /**
     * A basic feature test example.
     */
    public function test_list(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->get($this->prefixUrl);
        $response->assertStatus(200);
    }

    public function test_create(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $appointment = Appointment::factory()->create();

        $params['user_id'] = $user->id;
        $params['appointment_id'] = $appointment->id;

        $response = $this->post($this->prefixUrl, $params);
        $response->assertStatus(201);
    }

    public function test_update(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $appointment = Appointment::factory()->create();

        $params['user_id'] = $user->id;
        $params['appointment_id'] = $appointment->id;

        $response = $this->post($this->prefixUrl, $params);

        $response = $this->put($this->prefixUrl . json_decode($response->getContent())->data->response->id, $params);
        $response->assertStatus(200);
    }

    public function test_find(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $appointment = Appointment::factory()->create();

        $params['user_id'] = $user->id;
        $params['appointment_id'] = $appointment->id;

        $response = $this->post($this->prefixUrl, $params);
        $response = $this->get($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $response->assertStatus(200);
    }

    public function test_delete(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $appointment = Appointment::factory()->create();

        $params['user_id'] = $user->id;
        $params['appointment_id'] = $appointment->id;

        $response = $this->post($this->prefixUrl, $params);
        $response = $this->delete($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $response->assertStatus(200);
    }
}
