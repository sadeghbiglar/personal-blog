@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">نتایج جستجو برای "{{ $query }}"</h2>

    @if ($posts->count())
        @foreach ($posts as $post)
            <div class="bg-white p-4 mb-4 shadow rounded-lg">
                <h3 class="text-xl font-bold">
                    <a href="{{ route('post.show', $post) }}" class="text-blue-600">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-600 text-sm">{{ $post->created_at->format('Y-m-d') }}</p>
                <p class="mt-2">{{ Str::limit($post->content, 150) }}</p>
            </div>
        @endforeach

        {{ $posts->links() }}
    @else
        <p class="text-gray-600">هیچ نتیجه‌ای یافت نشد.</p>
    @endif
</div>
@endsection
