<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('user_group', function($t){
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->string('group_name', 128);
            $t->string('agency_acounts', 10)->default('0,0,0');
            $t->string('maid_data', 10)->default('0,0,0');
            $t->string('employer_data', 10)->default('0,0,0');
            $t->string('supplier_data', 10)->default('0,0,0');
            $t->string('maid_application', 10)->default('0,0,0');
            $t->string('users_group', 10)->default('0,0,0');
            $t->string('payment', 10)->default('0,0,0');
            $t->string('refund', 10)->default('0,0,0');
            $t->string('report', 10)->default('0,0,0');
            $t->string('company_profile', 10)->default('0,0,0');
            $t->string('informs_table_name', 64);
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
