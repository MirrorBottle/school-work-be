<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Faker::create('id_ID');

        return [
            'name' => $this->faker->name,
            'gender' => mt_rand(0, 1),
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->e164PhoneNumber,
            'join_date' => Carbon::createFromDate(mt_rand(2000, date('Y')), mt_rand(1, 12), mt_rand(1, 31)),
            'date_of_birth' => Carbon::createFromDate(mt_rand(1950, date('Y')), mt_rand(1, 12), mt_rand(1, 31)),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'address' => $this->faker->streetAddress,
            'job' => $this->faker->jobTitle,
            'remember_token' => Str::random(10),
        ];
    }
}
