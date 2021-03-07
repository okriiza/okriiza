<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = collect([
            'Tutorial',
            'Web Design',
            'Web Developer',
            'Teknologi',
            'Pengetahuan',
            'Tips And Trick'
        ]);

        $category->each(function($category){
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        });
    }
}
