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
        Schema::create('matched__mates', function (Blueprint $table) {
            $table->id();
            $table->string('user_name')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_location')->nullable();
            $table->string('soulmate_name')->nullable();
            $table->string('soulmate_phone')->nullable();
            $table->string('soulmate_location')->nullable();
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
        Schema::dropIfExists('matched__mates');
    }
};
