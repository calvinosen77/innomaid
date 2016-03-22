<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaidEmploymentHistorySingaporeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('maid_employment_history_singapore', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->string('employer', 64);
            $t->string('feedback', 256);
            $t->timestamps();

//            $t->foreign('user_id')->references('id')->on('maid_informs');

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
