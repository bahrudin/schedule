<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogCategory>
 */
class BlogCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $category = ['Ekonomi','IT','Kesehatan','Sosial','Pendidikan','politik'];

        return [
            'name'=> fake()->unique()->randomElement($category),
            'descriptions' => fake()->paragraph,
            'slug'=> Str::slug(fake()->randomElement($category)),
        ];
    }
}
