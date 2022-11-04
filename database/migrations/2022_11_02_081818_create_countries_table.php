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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('continent_code')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('iso2_code')->nullable();
            $table->string('iso3_code')->nullable();
            $table->string('iso_numeric_code')->nullable();
            $table->string('fips_code')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('common_name')->nullable();
            $table->string('official_name')->nullable();
            $table->string('endonym')->nullable();
            $table->string('demonym')->nullable();
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
        Schema::dropIfExists('countries');
    }
};
										
