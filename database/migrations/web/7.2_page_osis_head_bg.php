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
        Schema::create('page_osis_head_bg', function (Blueprint $table) {
            $table->text('page_head_img')->default('default.png');
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
