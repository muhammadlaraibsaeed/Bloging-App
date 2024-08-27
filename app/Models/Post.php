<?php

namespace App\Models;

use App\Jobs\PostTOMailJob;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function images()
    {
        return $this->hasMany(Image::class);
    }

    // Event Listner
    protected static function booted()
    {
        static::created(function ($post) {
            // $post is the latest post created
            Log::info('A new post has been created: ' . $post->title);

            // If you need to retrieve the most recent post again for some reason
            // This is typically not necessary as $post is the latest one
            $latestPost = self::latest('created_at')->first();
               PostTOMailJob::dispatch($latestPost);
            // Example action with the latest post
            Log::info('Latest post retrieved: ' . $latestPost->title);
        });
    
    }
    

}
