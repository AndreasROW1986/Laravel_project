<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Faker\Generator as Faker;
use Faker\Factory as Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(Factory $faktory)
    {
        //$provides = $faker->getProviders();
        $faker = $faktory::create('de_DE');
        
        //$this->call(UserSeeder::class);

        for ($i=0; $i < 10; $i++) { 
            
            // fill the table artikel            
            DB::table('artikels')->insert([
                'autor' => $faker->name(),
                'artikel' => $faker->realText($maxNbChars = 1000, $indexSize = 2),
                'date' => $faker->date($format = 'Y-m-d'), //2020-05-11
                'heading' => $faker->realText($maxNbChars = 200, $indexSize = 5)
                ]);    
            
            // fill the table comments            
            for ($j=0; $j < $faker->numberBetween($min = 2, $max = 6); $j++) { 
            DB::table('comments')->insert([
                'post_id' => DB::table('artikels')->max('id'),
                'content' => $faker->realText($faker->numberBetween($min = 50, $max = 150), $indexSize = 2)
                ]);
            }
        }        
    }
}
