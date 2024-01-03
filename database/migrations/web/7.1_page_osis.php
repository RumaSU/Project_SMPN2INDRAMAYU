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
        Schema::create('page_osis', function (Blueprint $table) {
            $table->uuid('page_osis_id')->primary();
            $table->string('page_logo');
            $table->text('page_description')->nullable();
            $table->string('page_strct_img', 512)->nullable();
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
