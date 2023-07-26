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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('bl_no');
            $table->string('booking_no');
            $table->string('starting_point');
            $table->string('destination');
            $table->string('vessel_voy_no');
            $table->string('no_of_packages');
            $table->date('on_board_date');
            $table->string('gross_cargo_weight');
            $table->string('no_of_containers');
            $table->string('measurement');
            $table->string('service_requirement');
            $table->string('progress1')->nullable();
            $table->string('progress2')->nullable();
            $table->string('container_no');
            $table->string('size');
            $table->string('type');
            $table->string('seal_no');
            $table->string('moveType');
            $table->string('latest_event');
            $table->string('place');
            $table->string('vgm');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
