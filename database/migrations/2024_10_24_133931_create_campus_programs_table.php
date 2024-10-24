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
        Schema::create('campus_programs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->default(null);
            $table->integer('campus_id')->nullable()->default(null);
            $table->integer('program_id')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campus_programs');
    }
};
