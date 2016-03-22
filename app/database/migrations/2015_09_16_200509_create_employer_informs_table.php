<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerInformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('employer_informs', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('supplier_id');
            $t->string('salutation',64);
            $t->string('first_name',64);
            $t->string('last_name',64);
            $t->integer('birthday_year');
            $t->integer('birthday_month');
            $t->integer('birthday_day');
            $t->string('nric',64);
            $t->string('address',128);
            $t->string('marital_status',64);
            $t->string('residence_type',64);
            $t->integer('marriage_registered_status');
            $t->string('citizenship',64);
            $t->string('phone_number',64);
            $t->string('home_number',64);
            $t->string('office_phone_number',64);
            $t->string('occupation',128);
            $t->string('company_name',128);
            $t->string('spouse_salutation',64);
            $t->string('spouse_first_name',64);
            $t->string('spouse_last_name',64);
            $t->integer('spouse_birthday_year');
            $t->integer('spouse_birthday_month');
            $t->integer('spouse_birthday_day');
            $t->string('spouse_nric',64);
            $t->integer('spouse_relationship');
            $t->string('spouse_citizenship',64);
            $t->string('spouse_phone_number',64);
            $t->string('spouse_home_number',64);
            $t->string('spouse_office_phone_number',64);
            $t->string('spouse_occupation',128);
            $t->string('spouse_company_name',128);
            $t->string('combined_income',128);
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
