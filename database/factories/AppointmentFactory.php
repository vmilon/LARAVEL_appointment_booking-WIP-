<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        // Retrieve a random user
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'date' => $this->faker->dateTimeBetween('now', '+1 month'), // Adjust date range as needed
            'fullname' => $user->fullname, // Use the fullname from the user
            'phone' => $user->phone,
            'email'=> $user->email,
            
        ];
    }
}
