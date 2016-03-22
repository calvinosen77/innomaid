<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsEmployerInformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('employer_informs', function($t) {
            $t->integer('employer_year_assessment1');
            $t->string('employer_annual_income1',64);
            $t->integer('employer_year_assessment2');
            $t->string('employer_annual_income2',64);
            $t->integer('spouse_year_assessment1');
            $t->string('spouse_annual_income1',64);
            $t->integer('spouse_year_assessment2');
            $t->string('spouse_annual_income2',64);
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
