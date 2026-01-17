<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Client;
use App\Models\CourtSpecification;
use App\Models\LegalCase;
use App\Models\TimeEntry;
use App\Models\Document;
use App\Models\CaseNote;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use App\Models\LegalCaseTransfer;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USERS
        |--------------------------------------------------------------------------
        */
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@system.test',
            'phone' => '0910000000',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $attorney1 = User::create([
            'name' => 'Ahmed Attorney',
            'email' => 'attorney1@system.test',
            'phone' => '0921111111',
            'role' => 'attorney',
            'password' => Hash::make('password'),
        ]);

        $attorney2 = User::create([
            'name' => 'Sara Attorney',
            'email' => 'attorney2@system.test',
            'phone' => '0922222222',
            'role' => 'attorney',
            'password' => Hash::make('password'),
        ]);

        $reception = User::create([
            'name' => 'Reception Desk',
            'email' => 'reception@system.test',
            'phone' => '0933333333',
            'role' => 'reception',
            'password' => Hash::make('password'),
        ]);

        /*
        |--------------------------------------------------------------------------
        | COURTS
        |--------------------------------------------------------------------------
        */
        $civilCourt = CourtSpecification::create([
            'name' => 'المحكمة المدنية',
            'code' => 'civil',
            'description' => 'قضايا مدنية وتجارية',
            'active' => true,
        ]);

        $criminalCourt = CourtSpecification::create([
            'name' => 'المحكمة الجنائية',
            'code' => 'criminal',
            'description' => 'قضايا جنائية',
            'active' => true,
        ]);

        $appealCourt = CourtSpecification::create([
            'name' => 'محكمة الاستئناف',
            'code' => 'appeal',
            'description' => 'قضايا الاستئناف',
            'active' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | CLIENTS (AUTH-READY)
        |--------------------------------------------------------------------------
        */
        $client1 = Client::create([
            'first_name' => 'محمد',
            'last_name' => 'السنوسي',
            'email' => 'client1@test.com',
            'phone' => '0915551111',
            'address' => 'طرابلس',
            'national_id' => '1234567890',
            'notes' => 'عميل دائم',
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        $client2 = Client::create([
            'first_name' => 'علي',
            'last_name' => 'المصراتي',
            'email' => 'client2@test.com',
            'phone' => '0926662222',
            'address' => 'مصراتة',
            'national_id' => '9876543210',
            'notes' => null,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
        ]);

        /*
        |--------------------------------------------------------------------------
        | LEGAL CASES
        |--------------------------------------------------------------------------
        */
        $case1 = LegalCase::create([
            'client_id' => $client1->id,
            'court_specification_id' => $civilCourt->id,
            'title' => 'قضية نزاع تجاري',
            'description' => 'نزاع على عقد تجاري',
            'case_number' => 'CIV-001',
            'status' => 'open',
            'filing_date' => now()->subDays(10),
        ]);

        $case2 = LegalCase::create([
            'client_id' => $client2->id,
            'court_specification_id' => $criminalCourt->id,
            'title' => 'قضية جنائية',
            'description' => 'دعوى جنائية',
            'case_number' => 'CRIM-001',
            'status' => 'pending',
            'filing_date' => now()->subDays(5),
        ]);

        /*
        |--------------------------------------------------------------------------
        | TIME ENTRIES
        |--------------------------------------------------------------------------
        */
        TimeEntry::create([
            'legal_case_id' => $case1->id,
            'user_id' => $attorney1->id,
            'work_date' => now()->subDays(2),
            'duration_minutes' => 120,
            'description' => 'مراجعة المستندات',
        ]);

        TimeEntry::create([
            'legal_case_id' => $case2->id,
            'user_id' => $attorney2->id,
            'work_date' => now()->subDay(),
            'duration_minutes' => 90,
            'description' => 'جلسة تحقيق',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DOCUMENTS
        |--------------------------------------------------------------------------
        */
        Document::create([
            'legal_case_id' => $case1->id,
            'user_id' => $attorney1->id,
            'title' => 'عقد تجاري',
            'description' => 'نسخة العقد',
            'file_path' => 'documents/contract.pdf',
            'mime_type' => 'application/pdf',
        ]);

        /*
        |--------------------------------------------------------------------------
        | CASE NOTES
        |--------------------------------------------------------------------------
        */
        CaseNote::create([
            'legal_case_id' => $case1->id,
            'user_id' => $attorney1->id,
            'title' => 'ملاحظة أولية',
            'body' => 'القضية تحتاج إلى مستندات إضافية',
        ]);

        /*
        |--------------------------------------------------------------------------
        | INVOICES
        |--------------------------------------------------------------------------
        */
        $invoice = Invoice::create([
            'legal_case_id' => $case1->id,
            'invoice_number' => 'INV-001',
            'issue_date' => now(),
            'due_date' => now()->addDays(14),
            'status' => 'issued',
            'total_amount' => 500,
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice->id,
            'description' => 'أتعاب استشارة قانونية',
            'quantity' => 1,
            'unit_price' => 500,
            'total_amount' => 500,
        ]);

        /*
        |--------------------------------------------------------------------------
        | LEGAL CASE TRANSFER
        |--------------------------------------------------------------------------
        */
        LegalCaseTransfer::create([
            'legal_case_id' => $case1->id,
            'from_court_id' => $civilCourt->id,
            'to_court_id' => $appealCourt->id,
            'user_id' => $admin->id,
            'reason' => 'نقل القضية إلى الاستئناف',
        ]);
    }
}
