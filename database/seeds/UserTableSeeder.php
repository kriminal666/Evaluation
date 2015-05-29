<?php

use Evaluation\User;

/**
 * User table seeder
 * Class UserTableSeeder
 */
class UserTableSeeder extends DatabaseSeeder
{

    /**
     * Table users seeder
     *
     * @method
     * @return void
     */
    public function run()
    {
        //First delete all table
        DB::table('users')->truncate();
        //use docs_seeder/users.csv to seed
        $csv = dirname(__FILE__) . '/docs_seeder/users.csv';
        $file_handle = fopen($csv, "r");
        $this->command->info('Table users starting seed!');
        //create unique email var
        $cont = 0;
        while (!feof($file_handle)) {
            $line = fgetcsv($file_handle);
            if (empty($line)) {
                continue; // skip blank lines
            }

            User::Create(array(
                'name' => $line[0] . $cont,
                'email' => $line[0] . "@example.com",
                'password' => Hash::make($line[1])
            ));
            $this->command->info('Seeded user :' . $cont);
            $cont++;

        }
        fclose($file_handle);
        //message
        $this->command->info('Table users seeded!');

    }

}