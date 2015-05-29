<?php

use Evaluation\Mark;
use Illuminate\Database\Eloquent\Model;

/**
 * Mark table seeder
 * Class MarkTableSeeder
 */
class MarkTableSeeder extends DatabaseSeeder
{

    /**
     * Table mark seeder
     *
     * @method
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //First delete all table
        DB::table('mark')->truncate();
        //insert 11 values
        for ($i = 0; $i <= 10; $i++) {
            Mark::create(['mark_value' => $i]);
        }
        //message
        $this->command->info('Table mark seeded!');

    }


}