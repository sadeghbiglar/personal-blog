<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeButton extends Component
{
    public $post;
    public $isLiked;
    public $likeCount;

    public function mount()
    {
        $this->likeCount = $this->post->likes()->count();
        $this->isLiked = $this->post->likes()->where('user_id', Auth::id())->exists();
    }

    public function toggleLike()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if ($this->isLiked) {
            $this->post->likes()->where('user_id', Auth::id())->delete();
            $this->likeCount--;
        } else {
            $this->post->likes()->create(['user_id' => Auth::id()]);
            $this->likeCount++;
        }

        $this->isLiked = !$this->isLiked;
    }

    public function render()
    {
        return view('livewire.like-button');
    }
}
