<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaidEmploymentHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('maid_employment_history', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->date('date_from');
            $t->date('date_to');
            $t->string('country', 64);
            $t->string('employer', 64);
            $t->string('work_duty', 256);
            $t->string('remarks', 256);
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
