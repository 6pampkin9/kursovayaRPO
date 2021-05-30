<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BigInitialMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('fio');
            $table->integer('age');
            $table->string('passport_number');
            $table->string('contact_data');
            $table->timestamps();
        });
        Schema::create('policy_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('price');
            $table->timestamps();
        });
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('series');
            $table->string('number');
            $table->date('date_registration');
            $table->date('valid_to');
            $table->unsignedBigInteger('policy_type_id');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('policy_type_id')->references('id')->on('policy_types');
        });
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->float('sum');
            $table->date('date_registration');
            $table->unsignedBigInteger('policy_id');
            $table->foreign('policy_id')->references('id')->on('policies');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchases');
        Schema::dropIfExists('products');
        Schema::dropIfExists('contacts');
    }
}
