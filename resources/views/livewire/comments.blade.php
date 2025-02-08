<div class="bg-white p-4 shadow rounded-lg mt-4">
    <h3 class="text-lg font-bold mb-2">نظرات</h3>

    @auth
        <form wire:submit.prevent="addComment">
            <textarea wire:model="body" class="w-full border p-2 rounded" placeholder="نظر خود را بنویسید..."></textarea>
            @error('body') <p class="text-red-500">{{ $message }}</p> @enderror
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">ارسال نظر</button>
        </form>
    @else
        <p class="text-gray-500">برای ارسال نظر لطفاً <a href="{{ route('login') }}" class="text-blue-500">وارد شوید</a>.</p>
    @endauth

    <div class="mt-4">
        @foreach ($comments as $comment)
            <div class="border-b py-2">
                <p class="text-sm text-gray-600">{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</p>
                <p>{{ $comment->body }}</p>
            </div>
        @endforeach
    </div>
</div>
