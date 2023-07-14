<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{ 
    public $title;
    public $content;

    public function mount($id)
    {
        $post = Post::find($id);
                
        if($post) {
            $this->postId   = $post->id;
            $this->title    = $post->title;
            $this->content  = $post->content;
        }
    }

   /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        if($this->postId) {

            $post = Post::find($this->postId);
            
            if($post) {
                $post->update([
                    'title'     => $this->title,
                    'content'   => $this->content
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit')
        -> extends('layouts.layouts')
        -> section('content');
    }
}
