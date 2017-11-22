<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassengersTicketInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passengers_ticket_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('airlines_id', false, 11)->nullable();
            $table->foreign('airlines_id')->references('id')->on('airlines_information');
            //$table->tinyInteger('business_type', false, 3)->nullable();
            $table->string('passenger_name', 30)->nullable();
            $table->integer('ticket_number', false, 20)->nullable();
            $table->date('issue_date')->nullable();
            $table->date('flying_date')->nullable();
            $table->tinyInteger('root_type', false, 3)->nullable();
            $table->string('root_from', 50)->nullable();
            $table->string('root_to', 50)->nullable();
            $table->double('basic_fair', 10,2)->nullable();
            $table->double('tax_amount', 10,2)->nullable();
            $table->double('ait_amount', 10,2)->nullable();
            $table->double('selling_price', 10,2)->nullable();
            $table->double('commission', 10,2)->nullable();
            $table->string('reference', 255)->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', array('active', 'inactive'))->nullable();
            $table->integer('created_by', false, 11)->nullable();
            $table->integer('updated_by', false, 11)->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('passengers_ticket_information');
    }
}
