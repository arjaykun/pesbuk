<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Post;

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
        $this->registerPolicies();
        
        Gate::define('modify-post', function (User $user, Post $post) {
            return $user->id == $post->user_id;
        });

        Gate::define('modify-comment', function (User $user, \App\Models\Comment $comment) {
            return $user->id == $comment->user_id;
        });

        Gate::define('modify-reply', function (User $user, \App\Models\Reply $reply) {
            return $user->id == $reply->user_id;
        });

        Gate::define('can-follow', function(User $user, \App\Models\Profile $profile) {
            return $user->id != $profile->id;
        });
    }
}
