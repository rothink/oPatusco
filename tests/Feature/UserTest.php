<?php

namespace Tests\Feature;

use App\Models\User;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;


class UserTest extends TestCase
{
    protected $prefixUrl = '/api/users/pre-requisite/medicos/';

    /**
     * A basic feature test example.
     */
    public function test_list_pre_requisite(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $response = $this->get($this->prefixUrl);
        $response->assertStatus(200);
    }
}
