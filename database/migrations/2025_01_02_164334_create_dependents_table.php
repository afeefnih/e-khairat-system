<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('No_Ahli'); // Foreign key referencing users' No_Ahli
            $table->string('full_name'); // Dependent's full name
            $table->string('relationship'); // Relationship to the user
            $table->integer('age'); // Age of the dependent
            $table->string('ic_number')->unique(); // Dependent's IC number
            $table->timestamps(); // Created and updated timestamps

            $table
                ->foreign('No_Ahli')
                ->references('No_Ahli')
                ->on('users')
                ->onDelete('cascade'); // Delete dependents when user is deleted
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};
