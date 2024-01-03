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
        Schema::create('page_osis_member', function (Blueprint $table) {
            $table->uuid('student_id')->nullable();
            $table->foreign('student_id')->references('student_id')->on('students')->onDelete('cascade');
            $table->string('role_osis')->nullable()->default('Anggota');
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
