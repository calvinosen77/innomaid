<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('users', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->string('email', 64);
            $t->string('password', 64);
            $t->integer('user_group')->unsigned();
            $t->timestamps();

//            $t->foreign('user_group')->references('id')->on('user_group');

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
