<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Employee;
//use App\Models\Order;
//use App\Models\Product;
//use App\Models\ProductCategory;
//use App\Models\Job;
//use App\Models\Supplier;
//use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

//        BlogCategory::factory(4)->create();
//        $this->call(RoleSeeder::class);
        $this->call(AdminUserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
//        Order::factory(10)->create();
    }
}
