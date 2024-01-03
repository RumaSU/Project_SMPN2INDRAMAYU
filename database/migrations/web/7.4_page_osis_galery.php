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
        Schema::create('page_osis_galery', function (Blueprint $table) {
            $table->uuid('page_osis_galery_id')->primary();
            $table->string('title_galery');
            $table->string('name_file', 512);
            $table->uuid('connect_pgos_gal_id')->nullable();
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
