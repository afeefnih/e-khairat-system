<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('bill_code')->unique(); // Unique bill code from ToyyibPay
            $table->decimal('amount', 10, 2); // Donation amount in RM
            $table->string('status'); // Payment status (success, pending, failed)
            $table->timestamps(); // Laravel's created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
