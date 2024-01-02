<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Uuid;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_profile_misi_image', function (Blueprint $table) {
            $table->id('id_misi_image');
            $table->string('name_files', 512)->default('default.png');
            $table->uuid('page_profile_id');
            $table->foreign("page_profile_id")->references("page_profile_id")->on("page_profile")->onDelete("cascade");
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
