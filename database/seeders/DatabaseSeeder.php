<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Client;
use App\Models\LegalCase;
use App\Models\CaseNote;
use App\Models\Document;
use App\Models\CourtSpecification;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $courts = [
            [
                'name' => 'محكمة مدنية',
                'code' => 'civil',
                'description' => 'القضايا المدنية والنزاعات بين الأفراد',
            ],
            [
                'name' => 'محكمة جنائية',
                'code' => 'criminal',
                'description' => 'القضايا الجنائية والجرائم',
            ],
            [
                'name' => 'محكمة إدارية',
                'code' => 'administrative',
                'description' => 'النزاعات مع الجهات الإدارية',
            ],
            [
                'name' => 'محكمة تجارية',
                'code' => 'commercial',
                'description' => 'قضايا الشركات والمعاملات التجارية',
            ],
            [
                'name' => 'محكمة أحوال شخصية',
                'code' => 'personal_status',
                'description' => 'الزواج، الطلاق، الميراث، الحضانة',
            ],
        ];

        foreach ($courts as $court) {
            CourtSpecification::updateOrCreate(['code' => $court['code']], $court);
        }

        // Create test users
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@firm.test',
            'password' => Hash::make('password'),
        ]);

        $attorney = User::create([
            'name' => 'Jane Attorney',
            'email' => 'attorney@firm.test',
            'password' => Hash::make('password'),
        ]);

        $paralegal = User::create([
            'name' => 'Sam Paralegal',
            'email' => 'paralegal@firm.test',
            'password' => Hash::make('password'),
        ]);

        // Create clients
        $clients = Client::factory(10)->create();

        // For each client, create 1–3 legal cases
        $clients->each(function ($client) use ($admin, $attorney, $paralegal) {
            $cases = LegalCase::factory(rand(1, 3))->create(['client_id' => $client->id]);

            foreach ($cases as $case) {
                // Assign users
                $case->users()->attach($attorney->id, ['role' => 'attorney']);
                $case->users()->attach($paralegal->id, ['role' => 'paralegal']);

                // Add notes
                CaseNote::factory(rand(2, 4))->create([
                    'legal_case_id' => $case->id,
                    'user_id' => $attorney->id,
                ]);

                // Add documents
                Document::factory(rand(1, 3))->create([
                    'legal_case_id' => $case->id,
                    'user_id' => $paralegal->id,
                ]);
            }
        });
    }
}
