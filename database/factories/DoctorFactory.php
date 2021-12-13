<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'hospital_id' => rand(1,3),
            'birth_date' => $this->faker->date(),
            'salary' => rand(10000, 99999),
            'phone_number' => $this->faker->regexify('09[0-9]{8}')
        ];
    }
}
