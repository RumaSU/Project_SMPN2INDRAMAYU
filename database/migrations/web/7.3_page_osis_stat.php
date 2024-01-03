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
        Schema::create('page_osis_stat', function (Blueprint $table) {
            $table->uuid('osis_leader');
            $table->foreign('osis_leader')->references('student_id')->on('students')->onDelete('cascade');
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('tiktok')->nullable();
            $table->text('youtube')->nullable();
            $table->uuid('page_osis_id');
            $table->foreign("page_osis_id")->references("page_osis_id")->on("page_osis")->onDelete("cascade");
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
