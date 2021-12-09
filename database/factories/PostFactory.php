<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(2,8)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(), 

            // Pembuatan paragraph pada array fakerParagraph 
            // cara 1
            // 'body' => '<p>' . implode('</p><p>', $this->faker->paragraphs(mt_rand(5, 10))). '</p>',

            // cara 2 menggubnakan map
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                            
                            // map tanpa arrow function 
                            // ->map(function($p) {
                            //     return "<p>$p</p>";
                            // })
                            // ->implode(''),

                            // menggunakan arrow function
                            ->map(fn($p) => "<p>$p</p>")
                            ->implode(''),
            
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,3),
        ];
    }
}
