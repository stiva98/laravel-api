<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Post;
use App\Models\Type;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::truncate();
        
        for ($i=0; $i < 30 ; $i++) { 
            $title = substr(fake()->sentence(), 0, 64);
            
            $randomType = Type::inRandomOrder()->first();

            $post = new Post();
            $post->title = $title;
            $post->slug = str()-> slug($title);
            $post->content = fake()->paragraph();
            $post->type_id = $randomType->id;
            $post->save();
        }
    }
}
