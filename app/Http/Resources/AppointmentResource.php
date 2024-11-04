<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Number;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'animal_name' => $this->animal_name,
            'animal_type_id' => $this->animal_type_id,
            'animal_age' => $this->animal_age,
            'symptoms' => $this->symptoms,
            'appointment_date' => $this->appointment_date,
            'appointment_period' => $this->appointment_period,
        ];
    }
}
