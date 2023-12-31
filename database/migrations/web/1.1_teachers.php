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
        Schema::create('teachers', function (Blueprint $table) {
            $table->uuid("teacher_id")->primary();
            $table->string('nip') -> unique();
            $table->string('name');
            $table->enum('type', ["Pendidik", "Tenaga Kependidikan"]);
            $table->string('sector');
            $table->string('email')->nullable();
            $table->date('years_sign');
            $table->enum('status', ["Aktif", "Tidak Aktif"])->default("Aktif");
            $table->boolean('is_published')->default(true);
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
