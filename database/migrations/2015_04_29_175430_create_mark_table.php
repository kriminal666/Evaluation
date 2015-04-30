<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;



class CreateMarkTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mark', function(Blueprint $table)
		{
			$table -> increments('mark_id');
            $table -> string('mark_value');
            $table->timestamp('mark_created_at');
            $table->integer('mark_creationUserId');
            $table->timestamp('mark_updated_at');
            $table->integer('mark_lastUpdateUserId');
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
		Schema::drop('mark');

	}

}
