<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post; // Assuming you have a Post model

class DeletePostsCommand extends Command
{
    protected $signature = 'delete:posts';
    protected $description = 'Delete posts older than 24 hours';

    public function handle()
    {
        // Get all posts older than 24 hours
        $posts = Post::where('created_at', '<', now()->subDay())->get();

        // Delete the posts
        foreach ($posts as $post) {
            $post->delete();
        }

        // Output a success message
        $this->info('Posts deleted successfully!');
    }
}