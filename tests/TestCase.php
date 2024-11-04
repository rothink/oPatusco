<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\Sanctum;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $baseUrl = 'http://localhost/api';


    /**
     * Migrates the database and set the mailer to 'pretend'.
     * This will cause the tests to run quickly.
     *
     */
    private function prepareForTests()
    {
//        Artisan::call('migrate:fresh');
//        Artisan::call('db:seed');
    }

    /**
     * Default preparation for each test
     *
     */
    public function setUp() :void
    {
        parent::setUp();
        $user = User::factory()->create([
            'role' => 'cliente',
        ]);

        Sanctum::actingAs($user);
        DB::beginTransaction();
        $this->prepareForTests();
    }

    public function tearDown() :void
    {
        DB::rollBack();
        parent::tearDown();
    }
}
