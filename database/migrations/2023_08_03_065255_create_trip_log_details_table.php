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
        Schema::create('trip_log_details', function (Blueprint $table) {
            $table->id();
            $table->integer('trip_log_id');
            $table->integer('type_id');
            $table->dateTime('time');
            $table->integer('place_id');
            $table->integer('user_id');
            $table->integer('user_pic_loc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_log_details');
    }
};
