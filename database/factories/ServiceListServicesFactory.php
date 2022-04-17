<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceListServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'service_status' => $this->faker->randomElement(['unassigned', 'repairing', 'done', 'need re-service']),
            'service_status' => 'unassigned',
            'service_id' => rand(1, 30),
            'list_service_id' => rand(1, 5),
        ];
    }
}
