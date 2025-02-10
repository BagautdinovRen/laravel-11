<?php

namespace App\Jobs;

use App\Models\Article;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Str;

class TestJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $title = Str::random(10);

        $article = new Article([
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => Str::random(20),
        ]);

        $user = User::find(1);

        $user->articles()->save($article);
    }
}
