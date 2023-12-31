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
            $table->text('page_logo')->nullable()->default('default.png');
            $table->string('page_description', 1024)->nullable();
            $table->text('page_strct_img')->nullable();
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
