<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $category = ['Ekonomi','IT','Kesehatan','Sosial','Pendidikan','politik'];

        for ($i = 1; $i <= 3; $i++) {
            BlogCategory::create([
                'name'=> $faker->unique()->randomElement($category),
                'descriptions' => $faker->paragraph,
                'sort_order' => $faker->numberBetween(1,10),
                'slug'=> $faker->unique()->randomElement($category),
            ]);

        }
    }
}
