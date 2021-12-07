<?php

namespace Database\Seeders;

use App\Models\Category;
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
        \App\Models\User::factory(3)->create();

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);
        Category::create([
            'name' => 'Programing',
            'slug' => 'programing',
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        \App\Models\Post::factory(10)->create();
    }
}
