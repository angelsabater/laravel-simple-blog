<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

        Gate::define('edit-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('delete-comment', function (User $user, Comment $comment) {
            Log::info($user->id === $comment->user_id);
            return $user->id === $comment->user_id;
        });
    }
}
