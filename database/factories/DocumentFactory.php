<?php

namespace Database\Factories;

use App\Models\Document;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    protected $model = Document::class;

    public function definition(): array
    {
        return [
            'legal_case_id' => null,
            'user_id'       => null,
            'title'         => $this->faker->words(3, true),
            'description'   => $this->faker->sentence,
            'file_path'     => 'documents/sample.pdf',
            'mime_type'     => 'application/pdf',
        ];
    }
}
