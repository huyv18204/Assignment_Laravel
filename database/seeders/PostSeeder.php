<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Nette\Schema\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();
        DB::table('users')->truncate();


        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => fake()->name()
            ]);
        }

        for ($i = 1; $i < 20; $i++) {
            $data = [
                'category_id' => rand(1, 10),
                'title' => fake()->text('50'),
                'image' => fake()->imageUrl(100, 100),
                'description' => fake()->text('50'),
                'content' => fake()->text(),
                'view' => rand(1, 100),
                'created_at' =>now(),
                'updated_at' =>now(),
            ];
            DB::table('posts')->insert($data);

        }


    }
}
