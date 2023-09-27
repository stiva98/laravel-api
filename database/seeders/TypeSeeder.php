<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });
    
        for ($i=0; $i < 30 ; $i++) { 
            $title = substr(fake()->sentence(), 0, 64);
            
            $type = new Type();
            $type->title = $title;
            $type->content = fake()->paragraph();
            $type->save();
        }
    }
}
