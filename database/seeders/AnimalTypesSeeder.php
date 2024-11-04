<?php

namespace Database\Seeders;

use App\Models\AnimalType;
use Illuminate\Database\Seeder;

class AnimalTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            'Cachorro',
            'Gato',
            'Papagaio',
            'Canário',
            'Porquinho da índia',
            'Peixe',
            'Coelho',
            'Hamsters'
        ];

        foreach ($types as $type) {
            AnimalType::create([
                'name' => $type,
            ]);
        }
    }
}
