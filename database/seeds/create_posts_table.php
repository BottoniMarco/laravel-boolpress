<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Post;

class create_posts_table extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $newPost = new Post();
            $newPost->title = $faker->text(50);
            $newPost->subtitle= $faker->text(60);
            $newPost->author= $faker->name;
            $newPost->publication_date= $faker->date;
            $newPost-> save();


        }
    }
}
