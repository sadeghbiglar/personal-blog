<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();

        for ($i = 1; $i <= 20; $i++) {
            Post::create([
                'user_id' => $users->random()->id,
                'category_id' => $categories->random()->id,
                'title' => "پست شماره $i",
                'slug' => Str::slug("پست شماره $i"),
                'content' => "این یک متن آزمایشی برای پست شماره $i است.",
                'image' => null,
            ]);
        }
    }
}
