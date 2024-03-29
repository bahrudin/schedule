<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'name' => fake()->name(),
                'email' => 'brebes_' . fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('brebes'),
                'is_status' => fake()->boolean(),
                'remember_token' => Str::random(10),
                'created_at' => $faker->date($format = 'Y-m-d', $timezone = 'Asia/Jakarta') . ' | ' . $faker->time($format = 'H:i:s', $timezone = 'Asia/Jakarta'),
                'updated_at' => $faker->date($format = 'Y-m-d', $timezone = 'Asia/Jakarta') . ' | ' . $faker->time($format = 'H:i:s', $timezone = 'Asia/Jakarta'),
            ]);
        }


        $user = User::create([
            'name' => 'Bahrudin',
            'email' => 'bahrudin.no8@gmail.com',
            'password' => Hash::make('brebes'),
            'is_status' => true,
            'remember_token' => Str::random(10),
        ]);

        $role = Role::create(['name' => 'Administrator']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}
