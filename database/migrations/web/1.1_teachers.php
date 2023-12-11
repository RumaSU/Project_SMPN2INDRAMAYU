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
            $table->string('status');
            $table->string('sector');
            $table->string('email')->nullable();
            $table->date('years_sign');
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