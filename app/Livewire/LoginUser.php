<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class LoginUser extends Component
{
    #[Validate('required|email')]
    public string $email;
    #[Validate('required|string')]
    public string $password;
    public bool $remember_me = false;

    public function messages()
    {
        return [
            'email.required'    => 'Email can not be left blank',
            'email.email'       => 'Please enter a valid email',
            'password.required' => 'Password cannot be left blank',
            'password.string'   => 'Password must be a string',
        ];
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt($this->only(['email', 'password']), $this->remember_me)) {

            session()->regenerate();
        }
    }

    public function render()
    {
        return view('livewire.login-user');
    }
}
