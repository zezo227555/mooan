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
        Schema::create('case_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('legal_case_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['attorney', 'paralegal', 'admin', 'intern', 'manager', 'staff',])->default('attorney'); // 'attorney', 'paralegal', etc.
            $table->unique(['legal_case_id', 'user_id']); // Avoid duplicate assignments
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_user');
    }
};
