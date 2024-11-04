<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@user.com',
            'password' => Hash::make('password'),
            'role' => 'cliente'
        ]);

        User::create([
            'name' => 'Recepcionista',
            'email' => 'recepcionista@user.com',
            'password' => Hash::make('password'),
            'role' => 'recepcionista'
        ]);

        User::create([
            'name' => 'Médico',
            'email' => 'medico@user.com',
            'password' => Hash::make('password'),
            'role' => 'medico'
        ]);

        User::factory(16)->create([
            'role' => 'cliente'
        ]);

        User::factory(4)->create([
            'role' => 'medico'
        ]);
    }
}
