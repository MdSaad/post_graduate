<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlinesInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('airlines_information', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('country_id', false, 11)->nullable();
		    $table->string('airlines_name',100)->nullable();
		    $table->text('note')->nullable();
		    $table->enum('status',array('active','inactive'))->nullable();
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
	    Schema::drop('country');
    }
}
