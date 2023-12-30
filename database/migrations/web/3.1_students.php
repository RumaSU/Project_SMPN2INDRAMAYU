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
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('student_id')->primary();
            $table->string('nis')->unique();
            $table->string('name');
            $table->enum('status', ['Aktif', 'Tidak Aktif', 'Pindah'])->default('Aktif');
            $table->enum('is_graduate', ['Lulus', 'Belum Lulus'])->default('Belum Lulus');
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
