@extends('layouts.app')

@section('content')
<div class="container mx-auto flex">
    <!-- ستون راست: سایدبار -->
    <aside class="w-1/4 p-4 bg-gray-100 rounded-lg">
        <h3 class="text-lg font-bold mb-2">جستجو</h3>
        <form action="{{ route('search') }}" method="GET" class="flex">
            <input type="text" name="q" placeholder="عنوان یا متن پست..." class="w-full border p-2 rounded-l focus:ring focus:ring-blue-300">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-r">🔍</button>
        </form>
        

        <h3 class="text-lg font-bold mb-2">دسته‌بندی‌ها</h3>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="#" class="text-blue-500">{{ $category->name }}</a>
                </li>
            @endforeach
        </ul>

        <h3 class="text-lg font-bold mt-4 mb-2">آرشیو ماهانه</h3>
        <ul>
            @foreach ($archives as $archive)
                <li>
                    <a href="#" class="text-blue-500">
                        {{ \Carbon\Carbon::create($archive->year, $archive->month)->translatedFormat('F Y') }} ({{ $archive->post_count }})
                    </a>
                </li>
            @endforeach
        </ul>

        <h3 class="text-lg font-bold mt-4 mb-2">آخرین پست‌ها</h3>
        <ul>
            @foreach ($latestPosts as $post)
                <li>
                    <a href="{{ route('post.show', $post) }}" class="text-blue-500">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- ستون وسط: نمایش پست‌ها -->
    <main class="w-2/4 p-4">
        <h2 class="text-2xl font-bold mb-4">آخرین پست‌ها</h2>
    
        @foreach ($posts as $post)
            <div class="bg-white p-6 mb-4 shadow rounded-lg transition hover:shadow-lg">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600 hover:underline">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 text-sm mt-1">{{ $post->created_at->format('Y-m-d') }}</p>
                <p class="mt-2 text-gray-700">{{ Str::limit($post->content, 150) }}</p>
                <a href="{{ route('post.show', $post) }}" class="text-blue-500 hover:underline mt-2 inline-block">مشاهده بیشتر</a>
            </div>
        @endforeach
    </main>
    
    <!-- ستون چپ -->
    <div class="w-1/4"></div>
</div>
@endsection
