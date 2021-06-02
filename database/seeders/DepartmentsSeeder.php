<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $department1 = Department::create([
            'name' => 'HB1'
        ]);
        $department2 = Department::create([
            'name' => 'HB2'
        ]);
        $department3 = Department::create([
            'name' => 'HB3'
        ]);
        $department4 = Department::create([
            'name' => 'HB4'
        ]);
    }
}
