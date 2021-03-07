<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExpertiseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expertise = collect([
            'Web Developer',
            'Web Design',
            'UI/UX Design',
        ]);

        $expertise->each(function($expertise){
            Expertise::create([
                'name' => $expertise,
                'slug' => Str::slug($expertise),
            ]);
        });
    }
}
