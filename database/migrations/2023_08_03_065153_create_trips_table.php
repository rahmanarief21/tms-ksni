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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->integer('user_id');
            $table->integer('destination');
            $table->text('purpose');
            $table->dateTime('departure_time');
            $table->dateTime('expected_return');
            $table->tinyInteger('has_luggage')->default(0);
            $table->tinyInteger('status')->default(0); //open close
            $table->tinyInteger('approval_status')->default(0);
            $table->integer('pic');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
