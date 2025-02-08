<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class Comments extends Component
{
    public $post;
    public $body;

    public function addComment()
    {
        $this->validate([
            'body' => 'required|string|min:3',
        ]);

        Comment::create([
            'post_id' => $this->post->id,
            'user_id' => Auth::id(),
            'body' => $this->body,
        ]);

        $this->body = ''; // پاک کردن فیلد بعد از ثبت نظر
        session()->flash('message', 'نظر شما ثبت شد.');
    }

    public function render()
    {
        return view('livewire.comments', [
            'comments' => $this->post->comments()->latest()->get()
        ]);
    }
}
