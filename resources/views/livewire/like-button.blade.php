<div>
    <button wire:click="toggleLike" class="text-red-500">
        @if ($isLiked)
            ❤️
        @else
            🤍
        @endif
        {{ $likeCount }}
    </button>
</div>
