@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white p-6 shadow rounded-lg">
        <h1 class="text-3xl font-bold">{{ $post->title }}</h1>
        <p class="text-gray-600 text-sm">{{ $post->created_at->format('Y-m-d') }}</p>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="w-full h-auto mt-4 rounded">
        @endif

        <div class="mt-4">
            {!! nl2br(e($post->content)) !!}
        </div>
    </div>
</div>
@livewire('like-button', ['post' => $post])

@livewire('comments', ['post' => $post])
@endsection


