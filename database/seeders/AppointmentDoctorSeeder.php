<?php

namespace Database\Seeders;

use App\Models\AppointmentDoctor;
use Illuminate\Database\Seeder;

class AppointmentDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppointmentDoctor::factory(5)->create();
    }
}
