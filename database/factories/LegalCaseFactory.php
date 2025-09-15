<?php

namespace Database\Factories;

use App\Models\LegalCase;
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalCaseFactory extends Factory
{
    protected $model = LegalCase::class;

    public function definition(): array
    {
        return [
            'client_id' => null, // assign later
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'case_number' => strtoupper($this->faker->bothify('CASE-####-???')),
            'status' => $this->faker->randomElement(['open', 'pending', 'closed']),
            'filing_date' => $this->faker->date(),
            'closing_date' => null,
        ];
    }
}
