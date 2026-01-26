<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            // Who receives the notification
            $table->nullableMorphs('notifiable');
            // notifiable_type: App\Models\User | App\Models\Client
            // notifiable_id
            // What triggered it
            $table->string('type'); // case_created, invoice_paid, document_added, etc.
            $table->string('title');
            $table->text('message')->nullable();
            // Optional navigation
            $table->string('url')->nullable();
            // Status
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
