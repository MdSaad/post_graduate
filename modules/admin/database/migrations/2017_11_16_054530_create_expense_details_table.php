<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expense_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('expense_head_id', false, 11);
            $table->foreign('expense_head_id')->references('id')->on('expense_head');
            $table->integer('expense_subhead_id', false, 11);
            $table->foreign('expense_subhead_id')->references('id')->on('expense_subhead');
            $table->tinyInteger('business_type');
            $table->string('expense_title',255)->nullable();
            $table->date('expense_date');
            $table->float('expense_amount');
            $table->text('note')->nullable();
            $table->enum('status',array('active','inactive','cancel'))->nullable();
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
        Schema::drop('expense_details');
    }
}
