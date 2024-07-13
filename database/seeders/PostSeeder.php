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
        DB::table('categories')->truncate();


        for ($i = 0; $i < 10; $i++) {
            DB::table('categories')->insert([
                'name' => fake()->realText(50)
            ]);
        }

        $data = [];
        for ($i = 1; $i < 1001; $i++) {
            $data[] = [
                'category_id' => rand(1, 10),
                'title' => fake()->text('50'),
                'image' => fake()->imageUrl(100,100),
                'description' => fake()->text('50'),
                'content' => fake()->text(),
            ];

            if ($i % 500 == 0) {
                DB::table('posts')->insert($data);
                $data = [];
            }
        }


    }
}
