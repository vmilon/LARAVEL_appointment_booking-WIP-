<?php

namespace Database\Seeders;

use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = FakerFactory::create();

        // Generate 2 users with the same name for 'name' and 'fullname'
        for ($i = 0; $i < 2; $i++) {
            $name = $faker->name;

            User::factory(1)->create([
                'name' => $name,
                'fullname' => $name,
                'email' => $faker->unique()->safeEmail, // Use $faker here instead of $this->faker
                'phone' => $faker->phoneNumber, // Add this line to generate a fake phone number
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
