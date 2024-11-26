<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth as Authenticator;
use Livewire\Component;

class Auth extends Component
{
    public function logout() {
        Authenticator::logout();

        session()->invalidate();

        $this->redirect('/users');
    }
    public function render()
    {
        return view('livewire.auth');
    }
}
