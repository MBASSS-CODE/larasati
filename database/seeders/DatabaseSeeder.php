<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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
        User::create([
            'name'      => 'Indra Kurniawan',
            'username'  => 'mbasss',
            'email'     => 'mbassscode',
            'password'  => bcrypt('123123')
        ]);

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
