<?php

namespace App\Http\Livewire\Post;
use App\Models\Post;
use Livewire\Component;

class Create extends Component
{
     /**
     * define public variable
     */
    public $title;
    public $content;

    public function create()  
    {
         $validatedData = $this->validate([
            'title' => 'required|min:6',
            'content' => 'required',
        ]);

         $post = Post::create($validatedData);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.create')
        -> extends('layouts.layouts')
        -> section('content');
    }
}
