<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAssessmentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('user_assessment', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->integer('year');
            $t->integer('income');
            $t->timestamps();

//            $t->foreign('user_id')->references('id')->on('users');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
