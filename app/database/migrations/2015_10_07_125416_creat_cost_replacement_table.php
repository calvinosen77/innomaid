<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCostReplacementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('cost_replacement', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('application_id')->unsigned();
            $t->integer('price_cos_first');
            $t->integer('price_cos_second');
            $t->integer('price_cos_third');

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
