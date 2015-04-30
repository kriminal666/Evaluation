<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('email');
			$table->string('password', 60);
			$table->rememberToken();
			$table->timestamp('users_created_at');
            $table->integer('users_creationUserId')->unsigned()->nullable();
            $table->timestamp('users_updated_at');
            $table->integer('users_lastUpdateUserId')->unsigned()->nullable();
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
		Schema::drop('users');
	}

}
