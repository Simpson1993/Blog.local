<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Category::truncate();

        foreach (range(1, 5) as $index) {
            Category::create([
                'name' => ucfirst($faker->word),
            ]);
        }
    }
}
