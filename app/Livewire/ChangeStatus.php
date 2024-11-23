<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChangeStatus extends Component
{
    public function changeUserStatus()
    {
        $user = Auth::user();

        if ($user->hasPrivateStatus()) {
            $user->setAttribute('status', 'public');
        } else {
            $user->setAttribute('status', 'private');
        }

        $user->save();
        $this->dispatch('status-changed');
    }

    public function render()
    {
        return view('livewire.change-status', [
            'hasPrivateStatus' => Auth::user()->hasPrivateStatus(),
        ]);
    }
}
