<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class); */

        factory(App\User::class, 5)->create()->each(function ($user) {
            for ($i = 0; $i < 5; $i++) {
                $user->posts()->save(factory(App\Post::class)->make());
                $user->comments()->save(factory(App\Comment::class)->make());
            }
        });
    }
}
