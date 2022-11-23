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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->unsigned();
            $table->string('name');
            $table->text('catch_phrase')->nullable();
            $table->string('email');
            $table->char('phone', 30);
            $table->text('address');
            $table->char('city', 50);
            $table->char('state', 50);
            $table->string('country');
            $table->string('website')->nullable();
            $table->char('latitude', 50)->nullable();
            $table->char('longitude', 50)->nullable();
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
        Schema::dropIfExists('companies');
    }
};
