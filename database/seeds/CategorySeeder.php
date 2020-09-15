<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Makanan'
            ],
            [
                'category_name' => 'Minuman'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
//        factory(Category::class)->create();
    }
}
