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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('No_Ahli')->unique(); // Membership number, unique identifier
            $table->string('ic_num')->unique(); // User's IC number
            $table->string('password'); // User password
            $table->string('full_name'); // Full name
            $table->text('address'); // User address
            $table->string('tel_num'); // Telephone number
            $table->string('email')->unique(); // User email
            $table->integer('age'); // User age
            $table->string('house_num')->nullable(); // House number (optional)
            $table->string('residency_stat'); // Residency status
            $table->string('payment_status')->default('unpaid'); // Payment status (default: unpaid)
            $table->string('transaction_id')->nullable(); // ToyyibPay transaction ID
            $table->string('bill_code')->nullable(); // ToyyibPay bill code
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
