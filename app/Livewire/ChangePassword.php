<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class ChangePassword extends Component
{
    public string $oldPassword;
    public string $newPassword;
    public string $newPassword_confirmation;

    public function rules()
    {
        return [
            'oldPassword' => [
                'required',
                'string',
                'current_password',
            ],
            'newPassword' => [
                'required',
                'string',
                Password::min(8)
                    ->mixedCase()
                    ->numbers(),
                'confirmed'
            ],
            'newPassword_confirmation' => [
                'required',
                'string',
            ],
        ];
    }

    public function messages()
    {
        return [
            'oldPassword.required'              => 'You must enter your current password',
            'oldPassword.string'                => 'Old password must be a string',
            'oldPassword.current_password'      => 'Entered password does not match current password',
            'newPassword.required'              => 'New password cannot be left blank',
            'newPassword.string'                => 'New password must be a string',
            'newPassword.min'                   => 'New password must be at least :min characters long',
            'newPassword.mixed'                 => 'New password must have at least one uppercase and one lowercase letter',
            'newPassword.numbers'               => 'New password must have at least one number',
            'newPassword.confirmed'             => 'New passwords and password confirmation must match each other',
            'newPassword_confirmation.required' => 'You must confirm your new password',
            'newPassword_confirmation.string'   => 'Password confirmation must be a string',
        ];
    }

    public function changeUserPassword()
    {
        $this->validate();

        $user = Auth::user();
        $user->setAttribute('password', $this->newPassword);
        $user->save();

        session()->regenerate();

        $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
