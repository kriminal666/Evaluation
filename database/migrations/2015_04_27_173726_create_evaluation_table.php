<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateEvaluationTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->increments('evaluation_id');
            $table->integer('evaluation_academic_period_id');
            $table->integer('evaluation_student_id');
            $table->integer('evaluation_study_subModule_id');
            $table->integer('evaluation_mark_id');
            $table->timestamp('evaluation_created_at');
            $table->integer('evaluation_creationUserId')->unsigned()->nullable();
            $table->timestamp('evaluation_updated_at');
            $table->integer('evaluation_lastUpdateUserId')->unsigned()->nullable();
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
