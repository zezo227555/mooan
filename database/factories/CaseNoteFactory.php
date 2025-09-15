<?php

namespace Database\Factories;

use App\Models\CaseNote;
use Illuminate\Database\Eloquent\Factories\Factory;

class CaseNoteFactory extends Factory
{
    protected $model = CaseNote::class;

    public function definition(): array
    {
        return [
            'legal_case_id' => null,
            'user_id' => null,
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph,
        ];
    }
}
