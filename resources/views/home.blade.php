@extends('layouts.app')

@section('content')
<div class="container mx-auto flex">
    <!-- ستون راست: سایدبار -->
    <aside class="w-1/4 p-4 bg-gray-100 rounded-lg">
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
            <div class="bg-white p-4 mb-4 shadow rounded-lg">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 text-sm">{{ $post->created_at->format('Y-m-d') }}</p>
                <p class="mt-2">{{ Str::limit($post->content, 150) }}</p>
            </div>
        @endforeach
    </main>

    <!-- ستون چپ -->
    <div class="w-1/4"></div>
</div>
@endsection
