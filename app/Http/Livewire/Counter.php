<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $pesan;
    public $count=0;
 
    public function increment()
    {
        $this->count++;
    }

     public function decrement()
    {
        $this->count--;
    }

    public function tampilpesan()
    {
        $this->pesan = "Hello Fauzi";
    }

    public function hidepesan()
    {
        $this->pesan = "";
    }

    // public function decrement(){
    //     $this->count--;
    // }
    public function render()
    {
        return view('livewire.counter')
        ->extends('layouts.layouts')
        ->section('content');
    }
}
