<?php

namespace App\Livewire;

use \Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class CreateUser extends Component
{
    public string $name;
    public string $email;
    public string $password;
    public string $status;

    public function rules()
    {
        return [
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:App\Models\User,email'],
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
            ],
            'status'   => ['required', 'string', Rule::in(['public', 'private'])],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Name can not be left blank',
            'name.string'       => 'Name must be a string',
            'email.required'    => 'Email can not be left blank',
            'email.email'       => 'Please enter a valid email',
            'email.unique'      => 'User with this email already exists',
            'password.required' => 'Password cannot be left blank',
            'password.string'   => 'Password must be a string',
            'password.min'      => 'Password must be at least :min characters long',
            'password.mixed'    => 'Password must have at least one uppercase and one lowercase letter',
            'password.numbers'  => 'Password must have at least one number',
            'status.required'   => 'You must select a valid status',
            'status.in'         => 'You must select a valid status',
        ];
    }

    public function createUser()
    {
        $this->validate();

        $user = User::create(
            $this->only(['name', 'email', 'password', 'status']),
        );

        Auth::login($user);

        $this->redirect('/users');
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
