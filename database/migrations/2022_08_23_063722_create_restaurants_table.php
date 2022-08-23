<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('code', 65);
            $table->string('address', 50);
            $table->unsignedBigInteger('dish_id')->nullable();
            $table->foreign('dish_id')->references('id')->on('dishes');
            $table->unsignedBigInteger('meniu_id')->nullable();
            $table->foreign('meniu_id')->references('id')->on('menius');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
