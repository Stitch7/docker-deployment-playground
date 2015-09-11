<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->boolean('is_identical_to_contact_details');
            $table->enum('salutation',['M','F'])->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();;
            $table->string('company')->nullable();
            $table->string('care_of')->nullable();
            $table->string('street')->nullable();;
            $table->string('zip')->nullable();;
            $table->string('city')->nullable();;
            $table->enum('country',array_keys(config('countries')))->nullable();;
            $table->string('email')->nullable();;
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
        Schema::drop('billing_details');
    }
}
