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
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('enrollment_id');

            $table->foreignId('student_id')->constrained('users', 'userId')->onDelete('cascade');

            $table->foreignId('course_id')->constrained('courses', 'course_id')->onDelete('cascade');

            $table->dateTime('enrollment_date');
            $table->enum('status', ['enrolled', 'withdrawn', 'completed'])->default('enrolled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollments');
    }
};
