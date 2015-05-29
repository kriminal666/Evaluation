<?php

use Evaluation\Evaluation;
use Illuminate\Database\Eloquent\Model;

/**
 * Evaluation table seeder
 * Class EvaluationTableSeeder
 */
class EvaluationTableSeeder extends DatabaseSeeder
{

    /**
     * Table evaluation seeder
     *
     * @method
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //First delete all table
        DB::table('evaluation')->truncate();

        //use docs_seeder/evaluation.csv to seed
        $csv = dirname(__FILE__) . '/docs_seeder/evaluation.csv';
        $file_handle = fopen($csv, "r");

        while (!feof($file_handle)) {
            $line = fgetcsv($file_handle);
            if (empty($line)) {
                continue; // skip blank lines
            }
            //create records
            Evaluation::Create(array(
                'evaluation_academic_period_id' => $line[0],
                'evaluation_student_id' => $line[1],
                'evaluation_study_subModule_id' => $line[2],
                'evaluation_mark_id' => $line[3]
            ));

        }
        fclose($file_handle);

        //message
        $this->command->info('Table evaluation seeded!');

    }


}