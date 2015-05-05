<?php

use Evaluation\GradeScale;
use Illuminate\Database\Eloquent\Model;


class GradeScaleTableSeeder extends DatabaseSeeder
{

    /**
     * Table grade_scale seeder
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //First delete all table
        DB::table('grade_scale')->truncate();

        //Create a record
        GradeScale::create(['grade_scale_description' => 'normal']);
        //message
        $this->command->info('Table grade_scale seeded!');

    }


}