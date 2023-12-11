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
            $table->uuid('student_id');
            $table->uuid('class_id');
            $table->foreign("student_id")->references("student_id")->on("students")->onDelete("cascade");
            $table->foreign("class_id")->references("class_id")->on("classes")->onDelete("cascade");
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
