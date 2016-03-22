<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatOtherServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('other_services', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('application_id')->unsigned();
            $t->string('price_other_title', 64);
            $t->integer('price_other_price');

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
