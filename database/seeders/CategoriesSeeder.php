<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category1 = Category::create([
            'name' => 'trang thai 1',
            'status' => 1
        ]);
        $category2 = Category::create([
            'name' => 'trang thai 2',
            'status' => 2
        ]);
        $category3 = Category::create([
            'name' => 'trang thai 3',
            'status' => 3
        ]);
    }
}
