<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genders = array(
            array('name' => 'Мужской'),
            array('name' => 'Женский'),
            array('name' => 'Универсальный')
        );

        // Uncomment the below to run the seeder
        DB::table('genders')->insert($genders);
    }
}
