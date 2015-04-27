<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('evaluation', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('evaluation_academic_period_id');
            $table->integer('evaluation_student_id');
            $table->integer('evaluation_study_submodule_id');
            $table->integer('evaluation_mark_id');
            $table->integer('evaluation_creation_user_id');
            $table->timestamps();
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
        Schema::dropIfExists('evaluation');
	}

}
