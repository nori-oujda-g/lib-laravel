<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // fake() génére un nom proche à la vérité
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'image' => fake()->name(),
            'password' => fake()->name(),
            'bio' => fake()->text(),
        ];
    }
}
