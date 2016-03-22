<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaidInformsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('maid_informs', function($t) {
            $t->engine = 'InnoDB';
            $t->increments('id')->unsigned();
            $t->integer('employer_id')->unsigned();
            $t->integer('supplier_id')->unsigned();
            $t->string('name', 64);
            $t->integer('birthday_year');
            $t->integer('birthday_month');
            $t->integer('birthday_day');
            $t->string('birth_place', 128);
            $t->integer('height');
            $t->integer('weight');
            $t->string('nationality', 128);
            $t->string('residential_address', 256);
            $t->string('contact_number', 64);
            $t->string('religion', 64);
            $t->string('education_level', 64);
            $t->integer('sibling_number');
            $t->string('marital_status',64);
            $t->integer('children_number');
            $t->string('allergy',128);
            $t->integer('mental_illness')->default(0);
            $t->integer('epilepsy')->default(0);
            $t->integer('asthma')->default(0);
            $t->integer('diabetes')->default(0);
            $t->integer('hypertension')->default(0);
            $t->integer('tuberculosis')->default(0);
            $t->integer('heart_disease')->default(0);
            $t->integer('malaria')->default(0);
            $t->integer('operations')->default(0);
            $t->string('others',128);
            $t->integer('physical_disabilities')->default(0);
            $t->integer('dietary_restrictions')->default(0);
            $t->integer('food_handling_pork')->default(1);
            $t->integer('food_handling_beef')->default(1);
            $t->string('food_handling_others', 128);
            $t->string('preference_rest_day', 64);
            $t->string('any_other_remarks', 128);
            $t->integer('base_on_fdw')->default(0);
            $t->integer('interviewed_singapore')->default(0);
            $t->integer('interviewed_overseas')->default(0);
            $t->integer('care_infant_willingness')->default(0);
            $t->integer('care_infant_years');
            $t->integer('care_infant_rate')->default(1);
            $t->string('care_infant_remark',256);
            $t->integer('care_elderly_willingness')->default(0);
            $t->integer('care_elderly_years');
            $t->integer('care_elderly_rate')->default(1);
            $t->string('care_elderly_remark',256);
            $t->integer('care_disabled_willingness')->default(0);
            $t->integer('care_disabled_years');
            $t->integer('care_disabled_rate')->default(1);
            $t->string('care_disabled_remark',256);
            $t->integer('general_housework_willingness')->default(0);
            $t->integer('general_housework_years');
            $t->integer('general_housework_rate')->default(1);
            $t->string('general_housework_remark',256);
            $t->integer('cooking_willingness')->default(0);
            $t->integer('cooking_years');
            $t->integer('cooking_rate')->default(1);
            $t->string('cooking_remark',256);
            $t->string('language_ability_name1',64);
            $t->string('language_ability_name2',64);
            $t->string('language_ability_name3',64);
            $t->string('other_skills_name',256);
            $t->integer('other_skills_level')->default(1);
            $t->integer('employment_history_singapore')->default(0);

            $t->timestamps();

//            $t->foreign('employer_id')->references('user_id')->on('employer_informs');
//            $t->foreign('supplier_id')->references('user_id')->on('supplier_informs');

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
