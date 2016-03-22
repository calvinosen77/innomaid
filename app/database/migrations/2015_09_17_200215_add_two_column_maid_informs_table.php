<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTwoColumnMaidInformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('maid_informs', function($t) {
            $t->string('profile_img', 128)->default('/assets/upload/images/maids/default_profile_img.jpg');
            $t->string('profile_full_img', 128)->default('/assets/upload/images/maids/default_full_img.jpg');
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
