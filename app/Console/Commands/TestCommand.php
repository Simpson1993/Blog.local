<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;
use App\Post;
use Eloquent;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command to test make:console';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $posts = Post::all();

        Eloquent::unguard();

        $this->ask('What is your name ?');
        $question1 = $this->ask('Скільки байтів в кілобайті?');
        if ($question1 == '1024'){
            $question2 = $this->ask('Скільки бітів в байті?');
            if ($question2 == '8') {
                DB::transaction(function () use ($posts) {
                    $posts->each(function ($post) {
                        $post->update([
                            'user_id' => rand(6, 6),
                        ]);
                    });
                });
            }elseif ($question2 == '1024'){
                $this->error('Whooops!');
            } else {
                $this->error('Wrong answer!');
            }
            $this->info('All work fine!');
        } else {
            $this->error('Wrong answer!');
        }
    }
}
