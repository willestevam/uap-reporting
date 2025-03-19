<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Report::class;
    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'sighting' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'street' => $this->faker->streetAddress(),
            'number' => $this->faker->buildingNumber(),
            'complement' => $this->faker->secondaryAddress(),
            'district' => $this->faker->citySuffix(),
            'city' => $this->faker->city(),
            'state' => $this->faker->stateAbbr(),
            'zipcode' => $this->faker->postcode(),
            'country' => $this->faker->country(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected','fake']),
            'slug' => Str::slug($this->faker->sentence()),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'visitor' => $this->faker->ipv4(),
            'user_id' => 1, // Or $this->faker->numberBetween(1, 10), if you have users
        ];
    }
}
