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
        Schema::create('page_osis_teguide', function (Blueprint $table) {
            $table->uuid('page_osis_id');
            $table->foreign("page_osis_id")->references("page_osis_id")->on("page_osis")->onDelete("cascade");
            $table->uuid('teacher_id')->nullable();
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers')->onDelete('cascade');
            $table->string('quote', 512)->nullable();
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
