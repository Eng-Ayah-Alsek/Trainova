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
        Schema::create('achievement_views', function (Blueprint $table) {
            $table->id('view_id');
            $table->foreignId('achievement_id')->constrained('achievements', 'achievement_id')->onDelete('cascade');
            $table->foreignId('financier_id')->constrained('users', 'userId')->onDelete('cascade');
            $table->dateTime('view_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievement_views');
    }
};
