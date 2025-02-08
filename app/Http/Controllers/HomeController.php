<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        // دریافت 10 پست آخر
        $posts = Post::latest()->take(10)->get();

        // دریافت 5 پست آخر برای سایدبار
        $latestPosts = Post::latest()->take(5)->get();

        // دریافت دسته‌بندی‌ها
        $categories = Category::all();

        // آرشیو ماهانه
        $archives = Post::selectRaw('YEAR(created_at) year, MONTH(created_at) month, COUNT(*) post_count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->get();

        return view('home', compact('posts', 'latestPosts', 'categories', 'archives'));
    }

    public function show(Post $post)
    {
        return view('post', compact('post'));
    }
}
