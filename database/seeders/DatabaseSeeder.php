<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\AppointmentFactory;
use App\Models\Appointment;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AppointmentSeeder::class);
        //AppointmentFactory::factoryForModel(Appointment::class)->count(10)->create();

        // You can add more seeders if needed.
    }
}
