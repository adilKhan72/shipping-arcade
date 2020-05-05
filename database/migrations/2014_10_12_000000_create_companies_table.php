<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
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
            $table->unsignedInteger('user_id');
            $table->string('company_name');
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('country_id');
            $table->string('postal_code');
            $table->string('website');
            $table->string('vat_number')->nullable();
            $table->json('address');
            $table->json('leads_from_countries_ids');
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
        Schema::dropIfExists('users');
    }
}
