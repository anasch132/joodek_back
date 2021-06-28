<?php

namespace Database\Factories;

use App\Models\ClientsInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsInfoFactory extends Factory
{
    protected $model = ClientsInfo::class;

    public function definition(): array
    {
        return [
            'email' => $this->faker->email,
            'notifyOption' => 'active',
        ];
    }
}
