<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('application', function($t){
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('employer_id')->unsigned();
            $t->integer('maid_id')->unsigned();
            $t->string('purpose', 32);
            $t->timestamps();

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
