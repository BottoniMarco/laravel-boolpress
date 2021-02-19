<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();
        foreach($posts as $post){

            for($i = 0; $i<3; $i++){
                $newComment = new Comment();

                $commentDate = $faker->dateTime();
                $newComment->post_id = $post->id;
                $newComment->author = $faker->userName;
                $newComment->text = $faker->sentence(10);
                $newComment->created_at = $faker->dateTime();
                $newComment->updated_at = $faker->dateTime();

                $newComment->save();
            }
        }
    }
}
