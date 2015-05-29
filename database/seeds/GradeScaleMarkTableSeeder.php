<?php

use Evaluation\GradeScaleMark;
use Illuminate\Database\Eloquent\Model;

/**
 * Grade_scale_mark table seeder
 * Class GradeScaleMarkTableSeeder
 */
class GradeScaleMarkTableSeeder extends DatabaseSeeder
{

    /**
     * Table grade_scale_mark seeder
     *
     * @method
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //First delete all table
        DB::table('grade_scale_mark')->truncate();
        //insert 11 values
        for ($i = 1; $i <= 11; $i++) {
            GradeScaleMark::create(['grade_scale_mark_gradeScaleID' => 1, 'grade_scale_mark_markID' => $i]);
        }
        //message
        $this->command->info('Table grade_scale_mark seeded!');

    }


}