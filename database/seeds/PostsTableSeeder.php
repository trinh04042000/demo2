<?php

use Illuminate\Database\Seeder;
use App\Post;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->title = 'Học lập đâu';
        $post->content = 'Migrations are like version control for your database, allowing your team to easily modify and share the applications database schema. Migrations are typically paired with Laravels schema builder to easily build your applications database schema.';
        $post->image = '';
        $post->user_id = 1;
        $post->catogory_id = 1;
        $post->save();

        $post = new Post();
        $post->title = 'Học lập trình ở đâu';
        $post->content = 'If you have ever had to tell a teammate to manually add a column to their local database schema, you\'ve faced the problem that database migrations solve';
        $post->image = '';
        $post->user_id = 1;
        $post->catogory_id = 1;
        $post->save();
    }
}
