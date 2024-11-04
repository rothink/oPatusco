<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnimalType extends AbstractModel
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table = 'animal_types';
}
