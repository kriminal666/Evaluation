<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;



class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
        //call users seeder
		$this->call('UserTableSeeder');

        //call grade_scale seeder
        $this->call('GradeScaleTableSeeder');

        //call mark table seeder
        $this->call('MarkTableSeeder');
	}

}


