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

        // register users table
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('ic_num')->unique(); // Use snake_case
            $table->string('password'); // User password
            $table->string('full_name'); // Full name in lowercase and snake_case
            $table->text('address'); // User address
            $table->string('tel_num'); // Telephone number
            $table->string('email')->unique(); // Email in lowercase
            $table->integer('age'); // Age
            $table->string('house_num')->nullable(); // House number, nullable for flexibility
            $table->string('residency_stat'); // Residency status
            $table->timestamp('registration_date')->useCurrent(); // Registration date
            $table->boolean('is_admin')->default(0); // 1 for admin, 0 for regular user
            $table->timestamps(); // Laravel's created_at and updated_at
        });

                // register dependents table
                // Example migration for dependents table
        Schema::create('dependents', function (Blueprint $table) {
            $table->id('dependent_id');
            $table->foreignId('No_Ahli')->constrained('users')->onDelete('cascade'); // This links the dependent to a user
            $table->string('full_name');
            $table->string('relationship');
            $table->integer('age');
            $table->string('ic_number');
            $table->timestamps();
        });




        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};