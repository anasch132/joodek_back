<?php

namespace Database\Factories;

use App\Models\Providers;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProvidersFactory extends Factory
{
    protected $model = Providers::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'show' => 'active',
            'phoneNumber' => $this->faker->phoneNumber(),
            'avatarUrl' => $this->faker->imageUrl($width = 640, $height = 480, 'cats')
        ];
    }
}
