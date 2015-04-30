<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeScaleMarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grade_scale_mark', function(Blueprint $table)
		{
			$table -> increments('grade_scale_mark_id');
            $table -> integer('grade_scale_mark_markID');
            $table -> integer('grade_scale_mark_gradeScaleID');
            $table->timestamp('grade_scale_mark_created_at');
            $table->integer('grade_scale_mark_creationUserId');
            $table->timestamp('grade_scale_mark_updated_at');
            $table->integer('grade_scale_mark_lastUpdateUserId');
            $table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('grade_scale_mark');
	}

}
