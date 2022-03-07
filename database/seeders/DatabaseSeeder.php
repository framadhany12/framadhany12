<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

    	// create user satu
        // DB::table('users')->insert([
        //	'name' => 'User Satu',
        //	'email' => 'user.satu@gmail.com',
        //	'email_verified_at' => now(),
        //	'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        //	'remember_token' => Str::random(10),
        // ]);

    	// call UserFactory userSatu state, function userSatu()
    	$userSatu = \App\Models\User::factory()->userSatu()->create();

        // call UserFactory default state, function definition()
        $otherUsers = \App\Models\User::factory()->count(5)->create();

        // combine $userSatu dengan $otherUsers
      $users = $otherUsers->concat([$userSatu]);

        // call BlogPostFactory default state, function definition()
       //\App\Models\BlogPost::factory()->count(5)->create();
      $posts = \App\Models\BlogPost::factory()->count(20)->make()->each(function($post) use ($users) {
     	$post->user_id = $users->random()->id;
        $post->save();
        });

        // call CommentFactory default state, function definition()
      $comments = \App\Models\Comments::factory()->count(20)->make()->each(function ($comment) use ($posts)

        {

            $comment->blog_post_id  = $posts->random()->id;

            $comment->save();

        });
    }
}
