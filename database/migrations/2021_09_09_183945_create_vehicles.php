<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicles extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('model', 50);
            $table->year('year');
            $table->double('day_price');
            $table->string('image_path');
            $table->boolean('available')->default(true);
            $table->timestamps();
            $table->foreignId('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('vehicles');
    }
}
