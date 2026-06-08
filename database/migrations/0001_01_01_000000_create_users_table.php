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
            $table->id('userId');
            $table->string('mail')->unique();
            $table->string('password_hash');
            $table->string('full_name');
            $table->string('phone')->nullable();
            $table->boolean('is_active')->default(false);
            $table->enum('role', ['admin', 'trainer', 'student', 'financier'])->default('student');

            // حقول الـ Student
            $table->string('student_number')->nullable();
            $table->date('date_birth')->nullable();
            $table->enum('account_status', ['pending', 'activated', 'deactivated'])->default('pending');

            // حقول الـ Mentor
            $table->string('specialization')->nullable();
            $table->integer('years_experience')->nullable();

            // حقول الـ Admin
            $table->enum('admin_level', ['super', 'regular'])->nullable();

            // حقول الـ Financier
            $table->string('organization_name')->nullable();

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
