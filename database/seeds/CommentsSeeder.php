<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Comment::truncate();

        foreach(range(1, 90) as $index)
        {
            Comment::create([
                'user_id' => rand(1, 6),
                'body' => $faker->sentence,
                'post_id' => rand(1, 30),
                'created_at' => $faker->dateTime
            ]);
        }
    }
}
