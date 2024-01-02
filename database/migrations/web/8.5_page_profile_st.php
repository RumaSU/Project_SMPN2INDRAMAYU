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
        Schema::create('page_profile_st', function (Blueprint $table) {
            $table->id('id_prf_st');
            $table->bigInteger('npsn')->unsigned()->default(0);
            $table->integer('wdth_sch')->unsigned()->bigInt()->default(0);
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
