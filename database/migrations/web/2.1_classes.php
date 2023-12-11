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
        Schema::create('classes', function (Blueprint $table) {
            $table->uuid('class_id')->primary();
            $table->uuid('teacher_id');
            $table->string('class_grade');
            $table->string('class_tag');
            $table->text('description')->nullable();
            $table->enum('status', ['Aktif', 'Alumni'])->default('Aktif');
            $table->boolean('is_published')->default(true);
            $table->year('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
