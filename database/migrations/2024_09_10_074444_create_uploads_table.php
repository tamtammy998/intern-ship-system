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
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->integer('document_id')->nullable()->default(null);
            $table->integer('student_id')->nullable()->default(null);
            $table->text('document_name')->nullable()->default(null);
            $table->text('document_path')->nullable()->default(null);
            $table->string('document_size')->nullable()->default(null);
            $table->string('document_extension')->nullable()->default(null);
            $table->string('status')->nullable()->default(null);
            $table->string('description')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uploads');
    }
};
