<?php

namespace App\Providers;

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
        'App\Models\BlogPost' => 'App\Policies\BlogPostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {

       $this->registerPolicies();
    Gate::resource('posts',     'App\Policies\BlogPostPolicy');
    //Gate::define('posts.update', 'App\Policies\BlogPostPolicy@update');

    //Gate::define('posts.delete', 'App\Policies\BlogPostPolicy@delete');
 

   /**  Gate::define('update-post', function($user, $blogPost) {

        return $user->id == $blogPost->user_id;

    });

 

    Gate::define('delete-post', function($user, $blogPost) {

        return $user->id == $blogPost->user_id;

    });**/
    Gate::before(function ($user, $ability){

        // Untuk ovveride semua permission

        if($user->is_admin){

           return true;

         }

 

        // Untuk override Gate Update-post saja

        //if($user->is_admin && in_array($ability, ['update-post'])){

          //  return true;

    });
    }
}