<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeScaleStudySubmodulesAcademicPeriodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gradeScale_studySubmodules_academicPeriods', function(Blueprint $table)
		{
			$table->increments('gradeScale_studySubmodules_academicPeriods_id');
            $table->integer('gradeScale_studySubmodules_academicPeriods_academicPeriodID');
            $table->integer('gradeScale_studySubmodules_academicPeriods_studySubmodulesID');
            $table->integer('gradeScale_studySubmodules_academicPeriods_gradeScaleID');
			$table->timestamp('gradeScale_studySubmodules_academicPeriods_created_at');
            $table->integer('gradeScale_studySubmodules_academicPeriods_creationUserId')->unsigned()->nullable();
            $table->timestamp('gradeScale_studySubmodules_academicPeriods_updated_at');
            $table->integer('gradeScale_studySubmodules_academicPeriods_lastUpdateUserId')->unsigned()->nullable();
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
		Schema::drop('gradeScale_studySubmodules_academicPeriods');
	}

}
