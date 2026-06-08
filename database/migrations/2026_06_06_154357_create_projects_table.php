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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('project_name');
            $table->text('description');
            $table->date('start_date');
            $table->enum('status', ['pending', 'active', 'completed'])->default('pending');

            $table->foreignId('category_id')->constrained('project_categories', 'category_id')->onDelete('cascade');
            $table->foreignId('added_by_admin_id')->constrained('users', 'userId')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
