<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        // $service_status = $this->faker->randomElement(['unassigned', 'repairing', 'done', 'need re-service']);
        $service_status = 'unassigned';

        if ($service_status == 'unassigned') {
            $mechanic_id = NULL;
        } else {
            $mechanic_id = rand(21, 30);
        }

        return [
            'car_name' => $this->faker->randomElement(['Sedan', 'Crossover', 'Lamborghini', 'Pagani ', 'Hyundai']),
            'car_plate_number' => $this->faker->numerify('DK ####'),
            'car_in_workshop' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'service_status' => $service_status,
            // 'customer_id' => User::pluck('id')[$this->faker->numberBetween(1, User::count() - 1)],
            'customer_id' => rand(1, 10),
            'mechanic_id' => $mechanic_id,
        ];
    }
}
