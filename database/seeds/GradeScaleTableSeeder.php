<?php

use Evaluation\GradeScale;

class GradeScaleTableSeeder extends DatabaseSeeder {

    /**
     * Table grade_scale seeder
     *
     * @return void
     */
    public function run()
    {
        //First delete all table
        DB::table('grade_scale')->delete();

        //Create a record
        GradeScale::create(['grade_scale_description' =>'normal']);
        //message
        $this -> command->info('Table grade_scale seeded!');

    }


}