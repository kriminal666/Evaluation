<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeScaleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grade_scale', function(Blueprint $table)
		{
			$table->increments('grade_scale_id');
			$table->string('grade_scale_description');
            $table->timestamp('grade_scale_created_at');
            $table->integer('grade_scale_creationUserId');
            $table->timestamp('grade_scale_updated_at');
            $table->integer('grade_scale_lastUpdateUserId');
            $table->softdeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grade_scale');
	}

}
