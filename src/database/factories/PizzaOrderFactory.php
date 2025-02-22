<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PizzaOrder>
 */
class PizzaOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $labels = collect($this->faker->words(5));

        return [
            'status' => $this->faker->randomElement(['open', 'completed', 'cancelled']),
            'message' => $this->faker->text(),
            'step_labels' => $labels->implode(','),
            'current_step' => $this->faker->numberBetween(0, count($labels) - 1),
            'step_progress' => $this->faker->numberBetween(0, 100),
            'order_number' => $this->faker->numberBetween(11111, 99999),
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
            'updated_at' => $this->faker->dateTimeBetween('-3 months'),
        ];
    }
}

/* TODO: update pizzaOrder model
 *     : - string of step labels 'one,two,three,etc...'
 *     : - current step progress to replace progress
 *     : - current step (used to determine how many steps (previous) are done and which step progress
 *     :   currently being tracked by the model. Future steps are considered incomplete.
 */
