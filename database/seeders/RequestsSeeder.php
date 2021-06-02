<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\RequestModel;
class RequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $author1 = User::where('name', 'admin1')->first();
        $author2 = User::where('name', 'user2')->first();
        $author3 = User::where('name','user1')->first();
        $author4 = User::where('name','manager1')->first();
        

        $faker = \Faker\Factory::create();
        
        for ($i=0; $i < 10; $i++) { 
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);

          $request = RequestModel::create([
              'title' => $title, 
              'status' =>"In progress",
              'description' => $faker->text($maxNbChars = 1000),
              'priority' => rand(1,4),
              'user_id' => $author3->id,
              'category_id' => 1,
              'manager' => "manager1",
              'start_date' => '2021-05-26',
              'due_date' => '2021-05-26'
          ]);
          $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
          $request = RequestModel::create([
            'title' => $title, 
            'status' =>"In progress",
            'description' => $faker->text($maxNbChars = 1000),
            'priority' => rand(1,4),
            'user_id' => $author2->id,
            'category_id' => 2,
            'manager' => "manager2",
            'start_date' =>'2021-05-26',
            'due_date' => '2021-05-26'
          ]);
        }
    }
}
