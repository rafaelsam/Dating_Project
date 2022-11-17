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
        Schema::create('user_data', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_phone_number')->unique()->nullable();
            $table->string('user_location')->nullable();
            $table->string('user_gender')->nullable();
            $table->integer('user_age')->nullable();
            $table->string('soulMate_location')->nullable();
            $table->string('soulMate_Age')->nullable();
            $table->string('soulMate_gender')->nullable();         
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
        Schema::dropIfExists('user_data');
    }
};
