<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $AuthorIds = User::pluck('id')->toArray();
        $CategoryIds = BlogCategory::pluck('id')->toArray();

        foreach(range(1, 100) as $index) {
            BlogPost::create([
                'title'     => $faker->sentence,
                'slug'     => $faker->sentence,
                'contents'     => $faker->paragraph,
                'is_publish' => $faker->boolean,
                'published_at' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'sort_order' => $faker->numberBetween(1,10),
                'category_id' => $faker->randomElement($CategoryIds),
                'author_id' => $faker->randomElement($AuthorIds),
            ]);
        }
    }
}

