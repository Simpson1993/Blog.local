<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Post::truncate();

        foreach(range(1, 30) as $index)
        {
            Post::create([
                'title' => $faker->sentence,
                'category_id' => rand(1, 2),
                'user_id' => rand(1, 2),
                'body' => $faker->text,
                'slug' => $faker->slug
            ]);
        }
    }
}

