<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        User::truncate();

        foreach (range(1, 5) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $faker->regexify('^[a-zA-Z]\w{3,14}$'),
                'profile_banner_url' => $faker->imageUrl(1000, 500),
                'profile_image_url' => $faker->imageUrl(200, 200),
                'age' => rand(16, 40),
                'about_me' => $faker->sentence,
                'contacts' => $faker->address
            ]);
        }

        User::create([
            'name' => 'Gordon Freemen',
            'email' => 'user1@user.com',
            'password' => '$2y$10$UahOpi8s4TzJfK8Sh853R.oNXU/dTvQE/O6AxkX8dlbCaT.jgMH9i',
            'profile_banner_url' => 'http://333v.ru/uploads/30/30c55b5f47847f75bdf17c97516460b1.jpg',
            'profile_image_url' => 'http://img0.joyreactor.cc/pics/post/full/%D0%98%D0%B3%D1%80%D1%8B-freeman-%D0%B2%D0%B0%D0%BD-%D0%B3%D0%BE%D0%B3-%D0%B3%D0%BE%D1%80%D0%B4%D0%BE%D0%BD-%D1%84%D1%80%D0%B8%D0%BC%D0%B5%D0%BD-888532.jpeg',
            'age' => '23',
            'about_me' => 'Перший девелопер на селі',
            'contacts' => 'Black Messa'
        ]);


    }
}
