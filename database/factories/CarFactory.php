<?php

namespace Database\Factories;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name'          => $this->faker->company,
            'model'         => $this->faker->word,
            'number_plate'  => $this->faker->regexify('[A-Z]{3}[0-9]{3}'),
            'description'   => $this->faker->sentence,
        ];
    }
}
