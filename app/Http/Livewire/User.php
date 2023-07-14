<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User as TableUser;
use Illuminate\Support\Facades\Hash;

class User extends Component
{
    public $user;
    public $id_;
    public $name;
    public $email;
    public $password;
    protected $rules = [
        'name' => 'required|min:6',
        'email' => 'required|email',
        // 'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'email.unique' => 'Email telah terdaftar',
        'password.required' => 'Password tidak boleh kosong.',
        'password.min' => 'Password Minimal 6 Karakter',
    ];

    public function resetInput()
    {
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }

    public function save()
    {
        $validate = $this->validate();

        TableUser::create($validate);
        session()->flash('message', 'Data Berhasil Ditambahkan');
        // Reset nilai input setelah penyimpanan
        $this->resetInput();
        $this->emit('adduser');
    }

    public function SaveUpdate()
    {
        $validate = $this->validate();
        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ];
        TableUser::Where('id', $this->id_)->update($data);
        session()->flash('message', 'Data Berhasil Di Update');
        $this->resetInput();
        $this->emit('edituser');
    }

    public function DeleteUser()
    {
        TableUser::where('id', $this->id_)->delete();
        session()->flash('message', 'Data Berhasil Di Hapus');
        $this->emit('deleteuser');
    }

    public function UserById($id)
    {
        $user = TableUser::where('id', $id)->first();
        $this->id_ = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
    }
    public function render()
    {
        $this->user = TableUser::orderBy('id', 'DESC')->get();
        return view('livewire.user')
            ->extends('layouts.layouts')
            ->section('content');
    }
}
