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
        Schema::create('dependents', function (Blueprint $table) {
            $table->id(); // Primary key for dependents
            $table->string('No_Ahli'); // Foreign key linking to `users` table's No_Ahli
            $table->string('full_name'); // Dependent's full name
            $table->string('relationship'); // Relationship with the user
            $table->integer('age'); // Dependent's age
            $table->string('ic_number'); // Dependent's IC number
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
            $table->foreign('No_Ahli')->references('No_Ahli')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
