<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Pesan extends Component
{
    public function render()
    {
        return view('livewire.user.pesan')->layout('layouts.user');
    }
}
