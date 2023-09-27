<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });
    
        for ($i=0; $i < 30 ; $i++) { 
            $title = substr(fake()->sentence(), 0, 64);
            
            $technology = new Technology();
            $technology->title = $title;
            $technology->content = fake()->paragraph();
            $technology->save();
        }
    }
}
