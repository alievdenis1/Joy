<?php

use Illuminate\Database\Seeder;

class ValueparametersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $valueparameters = array(
            array('parameter_id' => '1', 'name' => 'Сыну'),
            array('parameter_id' => '1', 'name' => 'Отцу'),
            array('parameter_id' => '1', 'name' => 'Дедушке'),
            array('parameter_id' => '1', 'name' => 'Брату'),
            array('parameter_id' => '1', 'name' => 'Другу'),
            array('parameter_id' => '1', 'name' => 'Любимому'),
            array('parameter_id' => '2', 'name' => 'Дочери'),
            array('parameter_id' => '2', 'name' => 'Матери'),
            array('parameter_id' => '2', 'name' => 'бабушке'),
            array('parameter_id' => '2', 'name' => 'Сестре'),
            array('parameter_id' => '2', 'name' => 'Подруге'),
            array('parameter_id' => '2', 'name' => 'Любимой'),
            array('parameter_id' => '2', 'name' => 'дочери'),
            array('parameter_id' => '3', 'name' => 'Начальнику'),
            array('parameter_id' => '3', 'name' => 'Коллеге')            
        );

        // Uncomment the below to run the seeder
        DB::table('valueparameters')->insert($valueparameters);
    }
}
