<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        //create a sample username by using firstname and lastname together
        $first_name = preg_replace("/[  .]/", '', $this->faker->name);
        $last_name = preg_replace("/[  .]/", '', $this->faker->name);

        $username = strtolower($first_name . $last_name);

        return [
            // 'username' => $this->faker->unique()->uuid,
            'username' => $username,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'phone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'role' => 'Standard',
            'password' => Hash::make(Str::random(8)),
            'remember_token' => Str::random(10),
        ];
    }
}
