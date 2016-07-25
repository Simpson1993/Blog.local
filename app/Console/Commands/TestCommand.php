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
        if ($this->confirm('Вы хотите продолжить? [yes|no]'))
        {
            DB::transaction(function() use ($posts){
                $posts->each(function($post) {
                    $post->update([
                        'user_id' => rand(6, 6),
                    ]);
                });
            });
            $this->info('All work fine!');
        }
    }
}
