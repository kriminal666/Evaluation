<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Mark table migration
 * Class CreateMarkTable
 */
class CreateMarkTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @method
     * @return void
     */
    public function up()
    {
        Schema::create('mark', function (Blueprint $table) {
            $table->increments('mark_id');
            $table->string('mark_value');
            $table->timestamp('mark_created_at');
            $table->integer('mark_creationUserId')->unsigned()->nullable();
            $table->timestamp('mark_updated_at');
            $table->integer('mark_lastUpdateUserId')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::drop('mark');

    }

}
