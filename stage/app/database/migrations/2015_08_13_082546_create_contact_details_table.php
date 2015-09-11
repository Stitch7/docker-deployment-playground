<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->enum('salutation',['M','F'])->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company')->nullable();
            $table->string('care_of')->nullable();
            $table->string('street');
            $table->string('zip');
            $table->string('city');
            $table->enum('country',array_keys(config('countries')));
            $table->string('phone');
            $table->string('email');
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
        Schema::drop('contact_details');
    }
}
