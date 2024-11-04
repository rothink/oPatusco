<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentDoctor extends AbstractModel
{
    use HasFactory;


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
