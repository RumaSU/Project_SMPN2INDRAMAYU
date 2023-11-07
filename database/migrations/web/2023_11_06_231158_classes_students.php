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
        Schema::create('classes_students', function (Blueprint $table) {
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('class_id');
            $table->foreign("students_id")->references("id")->on("students")->onDelete("cascade");
            $table->foreign("class_id")->references("id")->on("classes")->onDelete("cascade");
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
