<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Users')]
class ListUsers extends Component
{
    use WithPagination;

    protected $listeners = ['status-changed' => 'refresh'];

    public function render()
    {
        $users = User::where('status', 'public')->paginate(5);
        return view('livewire.list-users', [
            'users' => $users,
        ]);
    }
}
