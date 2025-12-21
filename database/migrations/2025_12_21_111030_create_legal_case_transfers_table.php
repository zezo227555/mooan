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
        Schema::create('legal_case_transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('legal_case_id')->constrained()->onDelete('cascade');
            $table->foreignId('from_court_id')->constrained('court_specifications')->onDelete('cascade');
            $table->foreignId('to_court_id')->constrained('court_specifications')->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // who did the transfer
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('legal_case_transfers');
    }
};
