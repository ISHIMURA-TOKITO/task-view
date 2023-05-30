<?php

namespace Database\Factories;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
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
        return [
            'name' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => ($this->faker->boolean()) ? Carbon::Parse($this->faker->dateTimeBetween('-3 week', '+2 week')) : null,
            'tel' => $this->faker->unique()->phoneNumber(),
            'password' => Hash::make('password'),
            'remember_token' => null,
        ];
    }

    /**
     * Set definitions for development users.
     */
    public function setDevelopmentUser()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => '開発ユーザ',
                'email' => 'admin@example.com',
                'email_verified_at' => Carbon::Now(),
            ];
        });
    }
}
