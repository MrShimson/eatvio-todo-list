<?php

namespace App\Livewire;

use Livewire\Component;

#[Title('Sign In')]
class LoginUser extends Component
{
    public function render()
    {
        return view('livewire.login-user');
    }
}
