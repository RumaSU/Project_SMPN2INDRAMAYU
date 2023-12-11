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
        Schema::create("users_roles", function(Blueprint $table){
            $table->uuid("user_id")->nullable();
            $table->foreign("user_id")->references("user_id")->on("users")->onDelete("cascade");
            $table->string("roles", 25);
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