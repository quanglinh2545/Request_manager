<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Role::where('slug', 'admin')->first();
        $manager = Role::where('slug', 'manager')->first();
        $user = Role::where('slug', 'user')->first();

        $user1 = User::create([
            'name' => 'admin1', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123123'),
            'department_id' => 1
        ]);
        $user1->roles()->attach($admin);

        $user2 = User::create([
            'name' => 'manager1', 
            'email' => 'manager@gmail.com',
            'password' => bcrypt('123123'),
            'department_id' => 1
        ]);
        $user2->roles()->attach($manager);

        $user3 = User::create([
            'name' => 'user1', 
            'email' => 'user@gmail.com',
            'password' => bcrypt('123123'),
            'department_id' => 1
        ]);
        $user3->roles()->attach($user);
        
    }
}
