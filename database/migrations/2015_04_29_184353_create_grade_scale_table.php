<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Grade scale table migration
 * Class CreateGradeScaleTable
 */
class CreateGradeScaleTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @method
     * @return void
     */
    public function up()
    {
        Schema::create('grade_scale', function (Blueprint $table) {
            $table->increments('grade_scale_id');
            $table->string('grade_scale_description');
            $table->timestamp('grade_scale_created_at');
            $table->integer('grade_scale_creationUserId')->unsigned()->nullable();
            $table->timestamp('grade_scale_updated_at');
            $table->integer('grade_scale_lastUpdateUserId')->unsigned()->nullable();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @method
     * @return void
     */
    public function down()
    {
        Schema::drop('grade_scale');
    }

}
