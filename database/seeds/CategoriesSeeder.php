<?php

use Illuminate\Database\Seeder;
use App\Category;

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

        foreach(range(1, 5) as $index)
        {
            Category::create([
                'name' => ucfirst($faker->word),
            ]);
        }
    }
}
