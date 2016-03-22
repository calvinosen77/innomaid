<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create9columnsToServicesNewTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('services_new', function($t) {
            $t->string('price_reg_title', 256);
            $t->string('price_doc_title', 256);
            $t->string('price_med_title', 256);
            $t->string('price_pre_title', 256);
            $t->string('price_rei_title', 256);
            $t->string('price_hom_title', 256);
            $t->string('price_cou_title', 256);
            $t->string('price_eng_title', 256);
            $t->string('price_saf_title', 256);
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
