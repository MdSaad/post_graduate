<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHazzClientPaymentReceiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hazz_client_payment_receive', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hazz_client_information_id', false, 11);
            $table->foreign('hazz_client_information_id')->references('id')->on('hazz_client_information');
            $table->double('receive_amount', 10, 2)->nullable();
            $table->date('receive_date')->nullable();
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
        Schema::drop('hazz_client_payment_receive');
    }
}
