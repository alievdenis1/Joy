<?php

use Illuminate\Database\Seeder;

class ParametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parameters = array(
            array('name' => 'Мужские соц. роли'),
            array('name' => 'Женские соц. роли'),
            array('name' => 'Соц. роли')
        );

        // Uncomment the below to run the seeder
        DB::table('parameters')->insert($parameters);
    }
}
