<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Siswa extends Component
{
    
    public function render()
    {
        return view('livewire.siswa')
        ->extends('layouts.layouts')
        ->section('content');
    }
}
