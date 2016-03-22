<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgencyInformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('agency_informs', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('user_id')->unsigned();
            $t->string('company_logo', 128)->default('/assets/upload/images/companies/default_company_logo.png');
            $t->string('company_name', 128);
            $t->string('company_no', 128);
            $t->string('address', 256);
            $t->string('phone_number', 64);
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
