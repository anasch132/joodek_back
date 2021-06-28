<?php

namespace Database\Factories;

use App\Models\Catalogue;
use Illuminate\Database\Eloquent\Factories\Factory;

class CatalogueFactory extends Factory
{
    protected $model = Catalogue::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'provider_id' => $this->faker->randomDigit,
            'validFrom' => '2021-04-01',
            'validTo' => '2021-09-01',
            'city' => $this->faker->city
        ];
    }
}
