<?php

use Illuminate\Database\Seeder;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\City;


class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = array(
            array('name' => 'Челябинск',  'slug' => SlugService::createSlug(City::class, 'slug', 'Челябинск')),
            array('name' => 'Москва',  'slug' => SlugService::createSlug(City::class, 'slug', 'Москва')),
            array('name' => 'Санкт-Петербург',  'slug' => SlugService::createSlug(City::class, 'slug', 'Санкт-Петербург')),
            array('name' => 'Новосибирск',  'slug' => SlugService::createSlug(City::class, 'slug', 'Новосибирск')),
            array('name' => 'Екатеринбург',  'slug' => SlugService::createSlug(City::class, 'slug', 'Екатеринбург')),
            array('name' => 'Казань',  'slug' => SlugService::createSlug(City::class, 'slug', 'Казань')),
            array('name' => 'Нижний Новгород',  'slug' => SlugService::createSlug(City::class, 'slug', 'Нижний Новгород')),
            array('name' => 'Омск',  'slug' => SlugService::createSlug(City::class, 'slug', 'Омск')),
            array('name' => 'Самара',  'slug' => SlugService::createSlug(City::class, 'slug', 'Самара')),
            array('name' => 'Ростов-на-Дону',  'slug' => SlugService::createSlug(City::class, 'slug', 'Ростов-на-Дону')),
            array('name' => 'Уфа',  'slug' => SlugService::createSlug(City::class, 'slug', 'Уфа')),
            array('name' => 'Красноярск',  'slug' => SlugService::createSlug(City::class, 'slug', 'Красноярск')),
            array('name' => 'Пермь',  'slug' => SlugService::createSlug(City::class, 'slug', 'Пермь')),
            array('name' => 'Воронеж',  'slug' => SlugService::createSlug(City::class, 'slug', 'Воронеж')),
            array('name' => 'Волгоград',  'slug' => SlugService::createSlug(City::class, 'slug', 'Волгоград')),
            array('name' => 'Краснодар',  'slug' => SlugService::createSlug(City::class, 'slug', 'Краснодар')),
            
            
        );

        // Uncomment the below to run the seeder
        DB::table('cities')->insert($cities);
    }
}
