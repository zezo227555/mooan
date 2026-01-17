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

        // 🔑 Admin
        User::create([
            'name' => 'System Admin',
            'email' => 'admin@lawfirm.test',
            'phone' => '0910000000',
            'role' => User::ROLE_ADMIN,
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // ⚖️ Attorneys
        User::create([
            'name' => 'Ahmed Attorney',
            'email' => 'attorney1@lawfirm.test',
            'phone' => '0921111111',
            'role' => User::ROLE_ATTORNEY,
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        User::create([
            'name' => 'Sara Attorney',
            'email' => 'attorney2@lawfirm.test',
            'phone' => '0922222222',
            'role' => User::ROLE_ATTORNEY,
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // 🧾 Reception
        User::create([
            'name' => 'Reception Desk',
            'email' => 'reception@lawfirm.test',
            'phone' => '0933333333',
            'role' => User::ROLE_RECEPTION,
            'password' => Hash::make('password'),
            'is_active' => true,
        ]);

        // Create clients
        $clients = Client::factory(10)->create();

        $CourtSpecification = CourtSpecification::all('id');

        // For each client, create 1–3 legal cases
        $clients->each(function ($client) use ($CourtSpecification) {
            $cases = LegalCase::factory(rand(1, 3))->create(['client_id' => $client->id, 'court_specification_id' => $CourtSpecification->random()->id]);
        });
    }
}
