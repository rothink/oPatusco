<?php

namespace Tests\Feature;

use App\Models\AnimalType;
use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;


class AppointmentTest extends TestCase
{
    protected $prefixUrl = '/api/appointments/';

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

        $animalTypeId = AnimalType::create(['name' => 'teste']);
        Sanctum::actingAs($user);

        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;

        $response = $this->post($this->prefixUrl, $params);
        $response->assertStatus(201);
    }

    public function test_update(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $animalTypeId = AnimalType::create(['name' => 'teste']);

        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;

        $response = $this->post($this->prefixUrl, $params);

        $response = $this->put($this->prefixUrl . json_decode($response->getContent())->data->response->id, $params);
        $response->assertStatus(200);
    }

    public function test_find(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $animalTypeId = AnimalType::create(['name' => 'teste']);
        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;
        $response = $this->post($this->prefixUrl, $params);
        $response = $this->get($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $response->assertStatus(200);
    }

    public function test_delete(): void
    {
        $user = User::factory()->create([
            'role' => 'recepcionista'
        ]);
        Sanctum::actingAs($user);

        $animalTypeId = AnimalType::create(['name' => 'teste']);
        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;

        $response = $this->post($this->prefixUrl, $params);
        $response = $this->delete($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $response->assertStatus(200);
    }

    public function test_delete_exception_when_user_is_medico(): void
    {
        $user = User::factory()->create([
            'role' => 'medico'
        ]);
        Sanctum::actingAs($user);

        $animalTypeId = AnimalType::create(['name' => 'teste']);
        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;

        $response = $this->post($this->prefixUrl, $params);
        $response = $this->delete($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $message = json_decode($response->getContent())->message;

        $response->assertStatus(422);
        $this->assertEquals($message, 'Médico veterinário não pode excluir nenhum agendamento');
    }

    public function test_delete_exception_when_user_is_cliente(): void
    {
        $user = User::factory()->create([
            'role' => 'cliente'
        ]);
        Sanctum::actingAs($user);

        $animalTypeId = AnimalType::create(['name' => 'teste']);
        $params = $this->makeParams();

        $params['user_id'] = $user->id;
        $params['animal_type_id'] = $animalTypeId->id;

        $response = $this->post($this->prefixUrl, $params);
        $response = $this->delete($this->prefixUrl . json_decode($response->getContent())->data->response->id);
        $message = json_decode($response->getContent())->message;

        $response->assertStatus(422);
        $this->assertEquals($message, 'Cliente não pode excluir nenhum agendamento');
    }

    public function makeParams()
    {
        return [
            'animal_name' => fake()->name,
            'animal_age' => fake()->numberBetween(1, 10),
            'symptoms' => fake()->text(),
            'appointment_date' => fake()->dateTime->format('Y-m-d'),
            'appointment_period' => 'afternoon',
            'person_name' => 'Rodrigo'
        ];
    }
}
