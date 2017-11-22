<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmrahClientInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umrah_client_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name', 30)->nullable();
            $table->string('contact_no', 20)->nullable();
            $table->string('email', 20)->nullable();
            $table->string('passport_no', 50)->nullable();
            $table->string('nid_no', 50)->nullable();
            $table->date('booking_date')->nullable();
            $table->double('umrah_fair', 10, 2)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('note', 255)->nullable();
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
        Schema::drop('umrah_client_information');
    }
}
