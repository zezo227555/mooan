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
use App\Models\Notification;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | USERS (STAFF)
        |--------------------------------------------------------------------------
        */
        $admin = User::create([
            'name' => 'System Admin',
            'email' => 'admin@law.test',
            'phone' => '0910000000',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $attorney1 = User::create([
            'name' => 'Ahmed Ali',
            'email' => 'ahmed@law.test',
            'phone' => '0921111111',
            'role' => 'attorney',
            'password' => Hash::make('password'),
        ]);

        $attorney2 = User::create([
            'name' => 'Sara Omar',
            'email' => 'sara@law.test',
            'phone' => '0922222222',
            'role' => 'attorney',
            'password' => Hash::make('password'),
        ]);

        $reception = User::create([
            'name' => 'Reception Desk',
            'email' => 'reception@law.test',
            'phone' => '0933333333',
            'role' => 'reception',
            'password' => Hash::make('password'),
        ]);

        /*
        |--------------------------------------------------------------------------
        | COURTS
        |--------------------------------------------------------------------------
        */
        $civil = CourtSpecification::create([
            'name' => 'المحكمة المدنية',
            'code' => 'civil',
            'description' => 'قضايا مدنية وتجارية',
            'active' => true,
        ]);

        $criminal = CourtSpecification::create([
            'name' => 'المحكمة الجنائية',
            'code' => 'criminal',
            'description' => 'قضايا جنائية',
            'active' => true,
        ]);

        $appeal = CourtSpecification::create([
            'name' => 'محكمة الاستئناف',
            'code' => 'appeal',
            'description' => 'قضايا استئناف',
            'active' => true,
        ]);

        /*
        |--------------------------------------------------------------------------
        | CLIENTS (AUTH READY)
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
            'court_specification_id' => $civil->id,
            'title' => 'نزاع تجاري',
            'description' => 'نزاع حول عقد تجاري',
            'case_number' => 'CIV-1001',
            'status' => 'open',
            'filing_date' => now()->subDays(15),
        ]);

        $case2 = LegalCase::create([
            'client_id' => $client2->id,
            'court_specification_id' => $criminal->id,
            'title' => 'دعوى جنائية',
            'description' => 'قضية اعتداء',
            'case_number' => 'CRIM-2001',
            'status' => 'pending',
            'filing_date' => now()->subDays(7),
        ]);

        /*
        |--------------------------------------------------------------------------
        | CASE ↔ USERS (ASSIGNMENTS)
        |--------------------------------------------------------------------------
        */
        $case1->users()->attach($attorney1->id, ['role' => 'attorney']);
        $case2->users()->attach($attorney2->id, ['role' => 'attorney']);

        /*
        |--------------------------------------------------------------------------
        | TIME ENTRIES
        |--------------------------------------------------------------------------
        */
        TimeEntry::create([
            'legal_case_id' => $case1->id,
            'user_id' => $attorney1->id,
            'work_date' => now()->subDays(3),
            'duration_minutes' => 120,
            'description' => 'مراجعة مستندات القضية',
        ]);

        TimeEntry::create([
            'legal_case_id' => $case2->id,
            'user_id' => $attorney2->id,
            'work_date' => now()->subDays(2),
            'duration_minutes' => 90,
            'description' => 'حضور جلسة تحقيق',
        ]);

        /*
        |--------------------------------------------------------------------------
        | DOCUMENTS
        |--------------------------------------------------------------------------
        */
        Document::create([
            'legal_case_id' => $case1->id,
            'user_id' => $attorney1->id,
            'title' => 'العقد الأصلي',
            'description' => 'نسخة من العقد التجاري',
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
            'title' => 'ملاحظة',
            'body' => 'نحتاج إلى مستندات إضافية من العميل',
        ]);

        /*
        |--------------------------------------------------------------------------
        | INVOICES
        |--------------------------------------------------------------------------
        */
        $invoice1 = Invoice::create([
            'legal_case_id' => $case1->id,
            'invoice_number' => 'INV-0001',
            'issue_date' => now()->subDays(5),
            'due_date' => now()->addDays(10),
            'status' => 'issued',
            'total_amount' => 1500,
        ]);

        InvoiceItem::create([
            'invoice_id' => $invoice1->id,
            'description' => 'أتعاب استشارة قانونية',
            'quantity' => 1,
            'unit_price' => 1500,
            'total_amount' => 1500,
        ]);

        /*
        |--------------------------------------------------------------------------
        | CASE TRANSFER
        |--------------------------------------------------------------------------
        */
        LegalCaseTransfer::create([
            'legal_case_id' => $case1->id,
            'from_court_id' => $civil->id,
            'to_court_id' => $appeal->id,
            'user_id' => $admin->id,
            'reason' => 'إحالة إلى الاستئناف',
        ]);

        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS (REAL EVENTS)
        |--------------------------------------------------------------------------
        */
        $attorney1->notifications()->create([
            'type' => 'case_assigned',
            'title' => 'قضية جديدة',
            'message' => 'تم إسناد قضية رقم CIV-1001 إليك',
            'url' => route('legal-cases.show', $case1->id),
        ]);

        $client1->notifications()->create([
            'type' => 'invoice_issued',
            'title' => 'فاتورة جديدة',
            'message' => 'تم إصدار فاتورة جديدة لقضيتك',
            'url' => route('client.invoices.index'),
        ]);
    }
}
