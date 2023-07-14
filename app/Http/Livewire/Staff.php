<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Staff extends Component
{
    public $name;
    public $email;
    public $no_telp;

    public $success;
 
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        'no_telp' => 'required|min:12',
    ];

    protected $messages = [
        'name.required' =>'The Name cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'no_telp.required' => 'Nomor Telepon tidak boleh kosong.',
        'no_telp.min' => 'No Telepon Minimal 12 Karakter',
    ];

    //Real Time Validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();
 
        // Execution doesn't reach here if validation fails.
 
        // Contact::create([
        //     'name' => $this->name,
        //     'email' => $this->email,
        //     'no_telp' => $this->email,
        // ]);

        $this->success = 'Data berhasil Di Simpan';
        session()->flash('message', 'Post successfully updated.');
 
        return redirect()->to('/staff');
    }

    public function render()
    {
        return view('livewire.staff')
        ->extends('layouts.layouts')
        ->section('content');
    }
}
