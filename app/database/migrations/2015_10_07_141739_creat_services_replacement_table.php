<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatServicesReplacementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('services_replacement', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('application_id')->unsigned();
            $t->integer('select_maid_id');
            $t->date('created_date');
            $t->string('nationality',64);
            $t->string('passport_no',64);
            $t->string('salary',128);
            $t->integer('replace_maid_id');
            $t->string('replace_passport_no',64);
            $t->integer('price_reg');
            $t->integer('price_doc');
            $t->integer('price_med');
            $t->integer('price_pre');
            $t->integer('price_rei');
            $t->integer('price_hom');
            $t->integer('price_cou');
            $t->integer('price_eng');
            $t->integer('price_saf');

            $t->integer('price_dep');
            $t->integer('price_fin');

            $t->integer('price_ful');
            $t->integer('price_oth');

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
