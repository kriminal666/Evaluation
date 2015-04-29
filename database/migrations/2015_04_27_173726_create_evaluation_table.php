<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('evaluation', function(Blueprint $table)
		{
			$table->increments('evaluation_id');
            $table->integer('evaluation_academic_period_id');
            $table->integer('evaluation_student_id');
            $table->integer('evaluation_study_subModule_id');
            $table->integer('evaluation_mark_id');
            $table->timestamp('evaluation_created_at');
            $table->integer('evaluation_creation_user_id');
            $table->timestamp('evaluation_updated_at');
            $table->integer('evaluation_updateUser_id');
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
        Schema::drop('evaluation');
	}

}
