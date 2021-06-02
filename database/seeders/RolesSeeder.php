<?php

namespace Database\Seeders;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
           $admin = Role::create([
            'name' => 'cán bộ HCNS', 
            'slug' => 'admin',
            'permissions' => [
                'request.admin' => true,
                'request.comment' =>true,
            ]
        ]);
        $manager = Role::create([
            'name' => 'quản lý bộ phận', 
            'slug' => 'manager',
            'permissions' => [
                'request.manager' => true,
                'request.comment' =>true,
                'request.accept' =>true,
           
            ]
        ]);
        $user = Role::create([
            'name' => 'người dùng', 
            'slug' => 'user',
            'permissions' => [
                'request.user' =>true,
              'request.create' =>true,
              'request.update' => true,
              'request.comment' =>true,
              'request.delete'=>true,
              
            ]
        ]);
    }
}
