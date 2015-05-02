<?php

use Evaluation\GradeScaleStudySubmodulesAcademicPeriods;
use Illuminate\Database\Eloquent\Model;


class GradeScaleStudySubmodulesAcademicPeriodsTableSeeder extends DatabaseSeeder {

    /**
     * Table gradeScale_studySubmodules_academicPeriods seeder
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //First delete all table
        DB::table('gradeScale_studySubmodules_academicPeriods')->truncate();

        //use docs_seeder/evaluation.csv to seed
        $csv =dirname(__FILE__).'/docs_seeder/gradeScaleStudySubmoulesAcademicPeriods.csv';
        $file_handle = fopen($csv, "r");

        while (!feof($file_handle)) {
            $line = fgetcsv($file_handle);
            if (empty($line)) {
                continue; // skip blank lines
            }
            //create records
            GradeScaleStudySubmodulesAcademicPeriods::Create(array(
                'gradeScale_studySubmodules_academicPeriods_academicPeriodID' => $line[0],
                'gradeScale_studySubmodules_academicPeriods_studySubmodulesID' => $line[1],
                'gradeScale_studySubmodules_academicPeriods_gradeScaleID' => $line[2]

            ));

        }
        fclose($file_handle);

        //message
        $this -> command->info('Table gradeScale_studySubmodules_academicPeriods seeded!');


    }


}